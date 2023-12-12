<?php

namespace App\Services;

use App\Contract\Repository\OrderDetailRepositoryInterface;
use App\Contract\Repository\OrderRepositoryInterface;
use App\Contract\Repository\UserRepositoryInterface;
use App\Contract\Service\AffiliatorServiceInterface;
use App\Contract\Service\OrderServiceInterface;
use App\Contract\Service\PayAffiliateServiceInterface;
use App\Ipaymu\Ipaymu;
use App\Ipaymu\IpaymuSplitPayment;
use App\Ipaymu\PaymentRedirect;
use App\Models\Order;
use App\Traits\HelperTrait;
use Carbon\Carbon;
use Illuminate\Support\Str;

class OrderService extends BaseService implements OrderServiceInterface
{
    use HelperTrait;
    protected $orderDetailRepository, $payAffiliateService, $affiliatorService, $userRepository;

    public function __construct(OrderRepositoryInterface $orderRepositoryInterface, OrderDetailRepositoryInterface $orderDetailRepositoryInterface, PayAffiliateServiceInterface $payAffiliateServiceInterface, AffiliatorServiceInterface $affiliatorServiceInterface, UserRepositoryInterface $userRepositoryInterface)
    {
        $this->repository = $orderRepositoryInterface;
        $this->orderDetailRepository = $orderDetailRepositoryInterface;
        $this->payAffiliateService = $payAffiliateServiceInterface;
        $this->affiliatorService = $affiliatorServiceInterface;
        $this->userRepository = $userRepositoryInterface;
    }

    public function getAllOrders()
    {
        return $this->repository->getAllOrders();
    }


    public function takeFiveLatestOrder()
    {
        $fiveOrders = $this->repository->takeFiveLatestOrder();

        $collection = collect();
        
        foreach ($fiveOrders as $order) {
            $data = [];
            
            foreach ($order->orderDetails as $detail) {
                $bookTitle = $detail->product->book->title;
                $productName = $detail->product->name;
                $price = $detail->product->price;
            
                if (!isset($data[$bookTitle])) {
                    $data[$bookTitle] = [
                        'product' => $productName,
                        'price' => $price
                    ];
                } else {
                    $data[$bookTitle]['product'] .= ', ' . $productName;
                    $data[$bookTitle]['price'] += $price;
                }
            }
        
            $collection->push([
                'name' => $order->user->name,
                'data' => $data,
                'created_at' => $order->created_at
            ]);
        }
        
        return $collection;
    }



    public function getSellingPercentage()
    {
        $sellings = $this->repository->getSellingPercentage();

        $lastMonth = $sellings['lastMonth'];
        $currentMonth = $sellings['currentMonth'];

        if($lastMonth->isEmpty() && $currentMonth->isEmpty()){
            return $this->sellingPercentageResult([
                [
                    'percentage' => 0,
                    'range' => [
                        0,
                        0
                    ]
                ],
                [
                    'percentage' => 0,
                    'range' => [
                        0,
                        0
                    ]
                ]
            ]);
        } 

        $yesterday = $currentMonth->where('created_at', '>=', now()->subDays(1)->startOfDay())
        ->where('created_at', '<=', now()->subDays(1)->endOfDay());
        $today = $currentMonth->where('created_at', '>=', now()->startOfDay())
        ->where('created_at', '<=', now()->endOfDay());

        // dapatkan price daily
        $priceYesterday =  $yesterday->pluck('orderDetails.*.product.price')->flatten()->sum();
        $priceToday = $today->pluck('orderDetails.*.product.price')->flatten()->sum();

        //dapatkan price monthly
        $priceLastMonth =  $lastMonth->pluck('orderDetails.*.product.price')->flatten()->sum();
        $priceCurrentMonth = $currentMonth->pluck('orderDetails.*.product.price')->flatten()->sum();


        // hitung persentasi daily
        $rangeDaily = $priceToday - $priceYesterday;
        $rangeDaily = $yesterday->isEmpty() ? 0 : ($rangeDaily / $priceYesterday) * 100;
        
        // hitung persentasi monthly
        $rangeMonthly = $priceCurrentMonth - $priceLastMonth;
        $rangeMonthly = $lastMonth->isEmpty() ? 0 : ($rangeMonthly / $priceLastMonth) * 100;

        $result = $this->sellingPercentageResult([
            [
                'percentage' => round($rangeDaily),
                'range' => [
                    $priceYesterday,
                    $priceToday
                ]
            ],
            [
                'percentage' => round($rangeMonthly),
                'range' => [
                    $priceLastMonth,
                    $priceCurrentMonth
                ]
            ]
        ]);

       
        return $result;

    }


    public function searchByCode(string $code)
    {
        return $this->repository->searchByCode($code);
    }

    public function makeOrder($products)
    {
        $order = $this->repository->create([
            'code' => $this->orderCode(),
            'user_id' => auth()->id(),
        ]);

        foreach($products as $product){
            $this->orderDetailRepository->create([
                'order_id' => $order->id,
                'product_id' => $product['id'],
            ]);
        }

        $order = $this->repository->with(['orderDetails'])->find($order->id);

        $paymentData = $this->makeUrlPayment($order);
        
        $order = $this->repository->update($order->id, [
            'session_id' => $paymentData['Data']['SessionID'],
            'payment_url' => $paymentData['Data']['Url'],
            'expired' => Carbon::now()->addHour(),
        ]);

        if(auth()->user()->email == 'user@demo.com'){
            $order->update(['status' => 1]);
        }

        return $order->load('orderDetails.product');
    }

    public function makeUrlPayment($order)
    {
        $config = [
            'env'               => env('IPAYMU_ENV'),
            'virtual_account'   => env('IPAYMU_VA'),
            'api_key'           => env('IPAYMU_KEY'),
            'notify_uri'        => route('webhook.ipaymu'),
            'cancel_uri'        => route('customer.index'),
            'return_uri'        => route('customer.index'),
        ];

        Ipaymu::init($config);
        
            // optional
            $customer = [
                'name'  => auth()->user()->name,
                'email' => auth()->user()->email,
                'phone' => auth()->user()->phone,
            ];
            Ipaymu::setCustomer($customer);

            $products = [];
            foreach($order->orderDetails as $orderDetail){
                array_push($products, [
                    'name' => $orderDetail->product->name,
                    'qty' => 1,
                    'price' => $orderDetail->product->price,
                    'description' => $orderDetail->product->name,
                ]);
            }

            foreach ($products as $product) {
                Ipaymu::addProduct($product);
            }
        
            // optional
            $payloadTrx = [
                'expired'     => 1, // in hours
                'referenceId' => $order->code,
            ];
        
            $redirectPayment = PaymentRedirect::create($payloadTrx);

            return $redirectPayment;
    }

    public function orderCode()
    {
        if($this->repository->getFirst() == null){
            $code = 'ORD/' . Carbon::now()->format('my') . '/001';
        }else{
            $code = $this->repository->getLatest()->code;
            $var = preg_split("#/#", $code);
            $new_code = 'ORD';

            if($var[1] == Carbon::now()->format('my')){
                $new_code .= '/' . $var[1];
                $new_code .= '/' . Str::padLeft($var[2] + '1', 3, '0');
            }else{
                $new_code .= '/' . Carbon::now()->format('my');
                $new_code .= '/' . Str::padLeft('1', 3, '0');
            }

            $code = $new_code;
        }

        return $code;
    }

    public function findOrderWithOrderDetails($order_id)
    {
        return $this->repository->with(['orderDetails.product'])->find($order_id);
    }

    public function getOrderWithOrderDetailsByUser($user_id)
    {
        return $this->repository->with(['orderDetails.product'])->findMany([['user_id', $user_id]]);
    }

    public function getSuccessOrderByUser($user_id)
    {
        return $this->repository->with(['orderDetails'])->findMany([['user_id', $user_id], ['status', 1]]);
    }

    public function getSuccessAndPendingByUser($user_id)
    {
        return $this->repository->with(['orderDetails'])->getSuccessOrPendingByUser($user_id);
    }

    public function updateStatusPayment($code, $status)
    {
        $order = $this->repository->with(['orderDetails'])->findFirst([['code', $code]]);

        $this->repository->update($order, ['status' => $status]);

        if($status == 1){
            $user = $this->userRepository->find($order->user_id);
            if($user->referrer_id !== null){
                $affiliator = $this->affiliatorService->getByUserId($user->referrer_id);

                if($this->payAffiliateService->getByUserIdAndOrderId($affiliator->user_id, $order->id) == null){
                    $payAffiliate = $this->payAffiliateService->create([
                        'order_id' => $order->id,
                        'user_id' => $user->referrer_id,
                        'amount' => ($order->orderDetails->sum('product.price') * 10) / 100,
                    ]);
    
                    Ipaymu::init([
                        'env'               => env('IPAYMU_ENV'),
                        'virtual_account'   => env('IPAYMU_VA'),
                        'api_key'           => env('IPAYMU_KEY')
                    ]);
    
                    $splitPayment = IpaymuSplitPayment::split([
                        'sender' => env('IPAYMU_VA'),
                        'receiver' => $affiliator->ipaymu_va,
                        'amount' => $payAffiliate->amount,
                        'referenceId' => $payAffiliate->id,
                    ]);
    
                    if($splitPayment['Status'] == 200){
                        $this->payAffiliateService->update($payAffiliate->id, ['status' => 1]);
                    }
                }
                
                return $order;
            }

        }
    }

    public function getUnSuccess()
    {
        return $this->repository->findMany([['status', '!=', 1]]);
    }

    public function getUnSuccessToday()
    {
        
    }
}
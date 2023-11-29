<?php

namespace App\Services;

use App\Contract\Repository\OrderDetailRepositoryInterface;
use App\Contract\Repository\OrderRepositoryInterface;
use App\Contract\Service\OrderServiceInterface;
use App\Ipaymu\Ipaymu;
use App\Ipaymu\PaymentRedirect;
use App\Models\Order;
use Carbon\Carbon;
use Illuminate\Support\Str;

class OrderService extends BaseService implements OrderServiceInterface
{
    protected $orderDetailRepository;

    public function __construct(OrderRepositoryInterface $orderRepositoryInterface, OrderDetailRepositoryInterface $orderDetailRepositoryInterface)
    {
        $this->repository = $orderRepositoryInterface;
        $this->orderDetailRepository = $orderDetailRepositoryInterface;
    }

    public function getAllOrders()
    {
        return $this->repository->getAllOrders();
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

    public function updateStatusPayment($order_id, $status)
    {
        return $this->repository->update($order_id, ['status' => $status]);
    }
}
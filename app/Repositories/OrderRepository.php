<?php

namespace App\Repositories;

use App\Contract\Repository\OrderRepositoryInterface;
use Carbon\Carbon;

class OrderRepository extends BaseRepository implements OrderRepositoryInterface
{
    protected $modelClass = \App\Models\Order::class;

    public function getAllOrders(int $status = 1, bool $withPaginate = true)
    {
        $query = $this->modelClass::with(['user' , 'orderDetails.product.book'])
        ->where('status' , $status)
        ->latest();
       
        if($withPaginate){
           $orders = $query
            ->paginate(5)
            ->withQueryString();
        }else{
            $orders = $query
                ->get();
        }

        return $orders;

    }

    public function getSpecifiecOrderProduct(int $productId, int $status = 1, bool $withPaginate = true)
    {
        $orders = $this->modelClass::with(['user' , 'orderDetails.product.book'])->whereHas('orderDetails' , function($details) use($productId){
            $details->where('product_id' , $productId);
          })
          ->where('status' , $status)
          ->latest()
        ->paginate(5)
        ->withQueryString();

       return $orders;

    }


    public function takeFiveLatestOrder()
    {
        $fiveOrders = $this->modelClass::with(['user:name,id', 'orderDetails' => function($orderDetail) {
            $orderDetail->select('id' , 'order_id' , 'product_id')
            ->with(['product' => function($product) {
                $product->select('id' , 'name' , 'book_id' , 'price')
                ->with(['book:id,title']);
            }]);
        }])
        ->select('id' , 'user_id' , 'created_at', 'status')
        ->where('status' , 1)
        ->latest()
        ->take(5)
        ->get();
        
        
        return $fiveOrders;
    }


    public function getSellingPercentage()
    {
        $month = now()->format('m');

        $lastMonth = $this->modelClass::with(['orderDetails.product'])->where('status' , 1)->whereMonth('created_at' , $month - 1)->get();
        $currentMonth = $this->modelClass::with(['orderDetails.product'])->where('status' , 1)->whereMonth('created_at' , $month)->get();

        return [
            'lastMonth' => $lastMonth,
            'currentMonth' => $currentMonth
        ];
    }
    

    public function searchByCode(string $code, $withProduct = null, int $status = 1)
    {
        $query = $this->modelClass::with(['user' , 'orderDetails.product.book']);

        if($withProduct){
          $orders =  $query->whereHas('orderDetails' , function($details) use($withProduct) {
                $details->where('product_id' , $withProduct);
            })
            ->where('code' , 'like' , '%' . $code . '%')
            ->where('status' , $status)
            ->paginate(5)
            ->withQueryString(); 
        }else{
            $orders = $query ->where('code' , 'like' , '%' . $code . '%')
            ->where('status' , $status)
            ->paginate(5)
            ->withQueryString();
        }
      

        return $orders;
    }

    public function getFirst()
    {
        return $this->getQuery()->first();
    }

    public function getLatest()
    {
        return $this->getQuery()->latest()->first();
    }

    public function getSuccessOrPendingByUser($user_id)
    {
        $orders = $this->getQuery()->where('user_id', $user_id)->where('status', 0)->orWhere('status', 1)->get();

        return $orders;
    }

    public function countSoldProduct(int $productId, int $status = 1)
    {
        return $this->modelClass::with(['orderDetails'])->whereHas('orderDetails' ,  function($details) use($productId){
            $details->where('product_id' , $productId);
        })->where('status' , $status)->count();
    }
}
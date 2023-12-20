<?php

namespace App\Repositories;

use App\Contract\Repository\OrderRepositoryInterface;
use Carbon\Carbon;

class OrderRepository extends BaseRepository implements OrderRepositoryInterface
{
    protected $modelClass = \App\Models\Order::class;

    public function getAllOrders()
    {
        $orders = $this->modelClass::with(['user' , 'orderDetails.product.book'])
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
        ->select('id' , 'user_id' , 'created_at')
        ->latest()
        ->take(5)
        ->get();
        
        
        return $fiveOrders;
    }


    public function getSellingPercentage()
    {
        $month = now()->format('m');

        $lastMonth = $this->modelClass::with(['orderDetails.product'])->whereMonth('created_at' , $month - 1)->get();
        $currentMonth = $this->modelClass::with(['orderDetails.product'])->whereMonth('created_at' , $month)->get();

        return [
            'lastMonth' => $lastMonth,
            'currentMonth' => $currentMonth
        ];
    }

    public function searchByCode(string $code)
    {
        $orders = $this->modelClass::with(['user' , 'orderDetails.product.book'])
        ->where('code' , 'like' , '%' . $code . '%')
        ->paginate(5)
        ->withQueryString();

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
}
<?php

namespace App\Repositories;

use App\Contract\Repository\OrderRepositoryInterface;

class OrderRepository extends BaseRepository implements OrderRepositoryInterface
{
    protected $modelClass = \App\Models\Order::class;

    public function getAllOrders()
    {
        $orders = $this->modelClass::with(['user' , 'orderDetails.product.book'])
        ->paginate(5)
        ->withQueryString();

        return $orders;

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
<?php

namespace App\Repositories;

use App\Contract\Repository\OrderRepositoryInterface;
use App\Models\Order;

class OrderRepository extends BaseRepository implements OrderRepositoryInterface
{
    protected $modelClass;

    public function __construct(Order $order)
    {
        $this->modelClass = $order;
    }

    public function getAllOrders()
    {
        $orders = $this->modelClass::with(['user' , 'orderDetail.product.book'])
        ->paginate(5)
        ->withQueryString();

        return $orders;

    }

    public function searchByCode(string $code)
    {
        $orders = $this->modelClass::with(['user' , 'orderDetail.product.book'])
        ->where('code' , 'like' , '%' . $code . '%')
        ->paginate(5)
        ->withQueryString();

        return $orders;
    }
}
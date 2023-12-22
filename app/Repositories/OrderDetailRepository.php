<?php

namespace App\Repositories;

use App\Contract\Repository\OrderDetailRepositoryInterface;

class OrderDetailRepository extends BaseRepository implements OrderDetailRepositoryInterface
{
    protected $modelClass = \App\Models\OrderDetail::class;

    public function countSoldProduct(int $productId, int $status = 1)
    {
        return $this->modelClass::where('product_id' , $productId)->where('status' , $status)->count();
    }
}
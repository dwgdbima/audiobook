<?php

namespace App\Repositories;

use App\Contract\Repository\OrderRepositoryInterface;

class OrderRepository extends BaseRepository implements OrderRepositoryInterface
{
    protected $modelClass = \App\Models\Order::class;

    public function getFirst()
    {
        return $this->getQuery()->first();
    }

    public function getLatest()
    {
        return $this->getQuery()->latest()->first();
    }
}
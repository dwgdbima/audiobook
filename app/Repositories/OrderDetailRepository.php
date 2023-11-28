<?php

namespace App\Repositories;

use App\Contract\Repository\OrderDetailRepositoryInterface;

class OrderDetailRepository extends BaseRepository implements OrderDetailRepositoryInterface
{
    protected $modelClass = \App\Models\OrderDetail::class;

}
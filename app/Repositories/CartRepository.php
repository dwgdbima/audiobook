<?php

namespace App\Repositories;

use App\Contract\Repository\CartRepositoryInterface;

class CartRepository extends BaseRepository implements CartRepositoryInterface
{
    protected $modelClass = \App\Models\Cart::class;

}
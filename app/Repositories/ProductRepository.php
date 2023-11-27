<?php

namespace App\Repositories;

use App\Contract\Repository\ProductRepositoryInterface;

class ProductRepository extends BaseRepository implements ProductRepositoryInterface
{
    protected $modelClass = \App\Models\Product::class;

}
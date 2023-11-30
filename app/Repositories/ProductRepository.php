<?php

namespace App\Repositories;

use App\Contract\Repository\ProductRepositoryInterface;

class ProductRepository extends BaseRepository implements ProductRepositoryInterface
{
    protected $modelClass = \App\Models\Product::class;

    public function storeBulkProduct(array $data)
    {
       try {
             $this->modelClass::insert($data);

            return true;
       } catch (\Exception $e) {
            return $e;
       }
    }
}
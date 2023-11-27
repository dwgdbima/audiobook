<?php

namespace App\Services;

use App\Contract\Service\ProductServiceInterface;

class ProductService extends BaseService implements ProductServiceInterface
{
    protected $repository = \App\Repositories\ProductRepository::class;

    public function getProductByBookId($id)
    {
        $products = $this->repository->with(['chapters'])->findMany([['book_id', $id]]);

        return $products;
    }
}
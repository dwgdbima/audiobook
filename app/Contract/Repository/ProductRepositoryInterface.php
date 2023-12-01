<?php

namespace App\Contract\Repository;

interface ProductRepositoryInterface extends BaseRepositoryInterface
{
    public function storeBulkProduct(array $data);

    public function updateProductDependOnBook(array $data);
}
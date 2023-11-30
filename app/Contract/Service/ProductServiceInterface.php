<?php

namespace App\Contract\Service;

interface ProductServiceInterface extends BaseServiceInterface
{
    /**
     * Get all product by book id
     *
     * @param $key
     * @return Model
     */
    public function getProductByBookId($id);

    public function displayProduct($id);

    public function storeBulkProduct(array $data);

    public function getAllProduct();

    public function findSingleProduct(int $id);
}
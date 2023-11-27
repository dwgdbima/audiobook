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
}
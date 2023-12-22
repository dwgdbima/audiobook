<?php

namespace App\Contract\Repository;

interface OrderDetailRepositoryInterface extends BaseRepositoryInterface
{
    public function countSoldProduct(int $productId, int $status = 1);
}
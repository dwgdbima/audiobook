<?php

namespace App\Contract\Service;

interface OrderDetailServiceInterface extends BaseServiceInterface
{
    public function countSoldProduct(int $productId);
}
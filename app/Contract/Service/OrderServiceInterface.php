<?php

namespace App\Contract\Service;

interface OrderServiceInterface extends BaseServiceInterface
{
    public function getAllOrders();
    public function searchByCode(string $code);
}
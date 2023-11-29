<?php

namespace App\Contract\Service;

interface OrderServiceInterface extends BaseServiceInterface
{
    public function makeOrder($products);

    public function orderCode();

    public function findOrderWithOrderDetails($order_id);

    public function getOrderWithOrderDetailsByUser($user_id);

    public function getSuccessOrderByUser($user_id);
}
<?php

namespace App\Contract\Service;

interface OrderServiceInterface extends BaseServiceInterface
{
    public function getAllOrders(int $status = 1, bool $withPaginate = true);

    public function getSpecifiecOrderProduct(int $productId, int $status = 1, bool $withPaginate = true);

    public function takeFiveLatestOrder();

    public function getSellingPercentage();

    public function countSuccessOrder();

    public function sumSuccessOrder();

    public function searchByCode(string $code, $withProduct = null, int $status = 1);
    
    public function makeOrder($products);

    public function orderCode();

    public function findOrderWithOrderDetails($order_id);

    public function getOrderWithOrderDetailsByUser($user_id);

    public function getSuccessOrderByUser($user_id);

    public function updateStatusPayment($order_id, $status);

    public function getUnSuccess();

    public function getUnSuccessHoursBefore();

    public function countSoldProduct(int $productId, int $status = 1);
}
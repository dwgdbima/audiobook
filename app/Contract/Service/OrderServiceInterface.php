<?php

namespace App\Contract\Service;

interface OrderServiceInterface extends BaseServiceInterface
{
    public function getAllOrders();

    public function getSpecifiecOrderProduct(int $productId);

    public function takeFiveLatestOrder();

    public function getSellingPercentage();

    public function countSuccessOrder();

    public function sumSuccessOrder();

    public function searchByCode(string $code, $withProduct = null);
    
    public function makeOrder($products);

    public function orderCode();

    public function findOrderWithOrderDetails($order_id);

    public function getOrderWithOrderDetailsByUser($user_id);

    public function getSuccessOrderByUser($user_id);

    public function updateStatusPayment($order_id, $status);

    public function getUnSuccess();
}
<?php

namespace App\Contract\Repository;

interface OrderRepositoryInterface extends BaseRepositoryInterface
{
    public function getAllOrders();

    public function getSpecifiecOrderProduct(int $productId);

    public function takeFiveLatestOrder();

    public function getSellingPercentage();

    public function searchByCode(string $code, $withProduct = null);

    public function getFirst();

    public function getLatest();

    public function getSuccessOrPendingByUser($user_id);
}
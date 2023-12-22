<?php

namespace App\Contract\Repository;

interface OrderRepositoryInterface extends BaseRepositoryInterface
{
    public function getAllOrders(int $status = 1, bool $withPaginate = true);

    public function getSpecifiecOrderProduct(int $productId, int $status = 1);

    public function takeFiveLatestOrder();

    public function getSellingPercentage();

    public function searchByCode(string $code, $withProduct = null, int $status = 1);

    public function getFirst();

    public function getLatest();

    public function getSuccessOrPendingByUser($user_id);

    public function countSoldProduct(int $productId, int $status = 1);
}
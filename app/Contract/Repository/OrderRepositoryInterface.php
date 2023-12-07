<?php

namespace App\Contract\Repository;

interface OrderRepositoryInterface extends BaseRepositoryInterface
{
    public function getAllOrders();

    public function takeFiveLatestOrder();

    public function getSellingPercentage();

    public function searchByCode(string $code);

    public function getFirst();

    public function getLatest();

    public function getSuccessOrPendingByUser($user_id);
}
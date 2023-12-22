<?php

namespace App\Services;

use App\Contract\Repository\OrderDetailRepositoryInterface;
use App\Contract\Service\OrderDetailServiceInterface;

class OrderDetailService extends BaseService implements OrderDetailServiceInterface
{
    protected $repository;

    public function __construct(OrderDetailRepositoryInterface $orderDetailRepositoryInterface)
    {
        $this->repository = $orderDetailRepositoryInterface;
    }

    public function countSoldProduct(int $productId, int $status = 1)
    {
        return $this->repository->countSoldProduct($productId , $status);
    }
}
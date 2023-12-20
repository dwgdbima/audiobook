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

    public function countSoldProduct(int $productId)
    {
        return $this->repository->findMany([['product_id' , $productId]])->count();
    }
}
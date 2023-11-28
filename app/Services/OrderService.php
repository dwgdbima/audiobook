<?php

namespace App\Services;

use App\Contract\Service\OrderServiceInterface;
use App\Repositories\OrderRepository;
use App\Services\BaseService;

class OrderService extends BaseService implements OrderServiceInterface
{
    protected $repository;

    public function __construct(OrderRepository $repository)
    {
        $this->repository = $repository;
    }


    public function getAllOrders()
    {
        return $this->repository->getAllOrders();
    }

    public function searchByCode(string $code)
    {
        return $this->repository->searchByCode($code);
    }
}
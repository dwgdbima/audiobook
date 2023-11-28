<?php

namespace App\Contract\Repository;

interface OrderRepositoryInterface extends BaseRepositoryInterface
{
    public function getFirst();

    public function getLatest();
}
<?php

namespace App\Contract\Service;

interface BookServiceInterface extends BaseServiceInterface
{
    /**
     * Get all Book with reviews
     *
     * @return LengthAwarePaginator
     */
    public function getAllWithReviewCount();
}
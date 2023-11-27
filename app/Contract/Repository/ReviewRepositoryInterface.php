<?php

namespace App\Contract\Repository;

interface ReviewRepositoryInterface extends BaseRepositoryInterface
{
    public function getReviewByBookId($id);
    public function expandReview($id);

    
}
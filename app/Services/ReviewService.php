<?php

namespace App\Services;

use App\Contract\Service\ReviewServiceInterface;

class ReviewService extends BaseService implements ReviewServiceInterface
{
    protected $repository = \App\Repositories\ReviewRepository::class;

    public function getReviewByBookId($id)
    {
        $reviews = $this->repository->findMany([['book_id', $id]]);

        return $reviews;
    }
}
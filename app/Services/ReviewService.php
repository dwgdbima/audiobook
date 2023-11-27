<?php

namespace App\Services;

use App\Contract\Service\ReviewServiceInterface;
use App\Models\Review;

class ReviewService extends BaseService implements ReviewServiceInterface
{
    protected $repository = \App\Repositories\ReviewRepository::class;

    public function getReviewByBookId($id)
    {
        $reviews = $this->repository->getReviewByBookId($id);

        return $reviews;
    }


    public function expandReview($reviewId)
    {
        $reviews = $this->repository->expandReview($reviewId);

        return $reviews;
    }


    public function storeReviewComment(array $data)
    {
        $newComment = $this->repository->create($data);

        return $newComment;
    }
}
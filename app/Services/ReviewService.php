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

        $reviews = $reviews->chunk(5);
        return $reviews;
    }

    public function storeReviewComment(array $data)
    {
        $newComment = $this->repository->create($data);

        return $newComment;
    }
}
<?php

namespace App\Services;

use App\Contract\Service\CommentServiceInterface;


class CommentService extends BaseService implements CommentServiceInterface
{
    protected $repository = \App\Repositories\CommentRepository::class;

    
    public function storeReviewComment(array $data)
    {
        $newComment = $this->repository->create($data);

        return $newComment;
    }
}
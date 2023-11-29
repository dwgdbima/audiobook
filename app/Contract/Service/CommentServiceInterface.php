<?php

namespace App\Contract\Service;

interface CommentServiceInterface extends BaseServiceInterface
{
    /**
     * Store any review comment
     */
    public function storeReviewComment(array $data);

    
}
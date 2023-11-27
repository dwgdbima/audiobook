<?php

namespace App\Contract\Service;

interface ReviewServiceInterface extends BaseServiceInterface
{
    /**
     * Get all review by book id
     *
     * @param $key
     * @return Model
     */
    public function getReviewByBookId($id);

    /**
     * Store any review comment
     */
    public function storeReviewComment(array $data);


    public function expandReview($id);
    
}
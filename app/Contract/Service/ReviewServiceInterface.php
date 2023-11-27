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
}
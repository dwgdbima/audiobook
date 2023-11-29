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

    /**
     * Get all Book with reviews
     *
     * @param $id
     * 
     * @return Model
     */
    public function findWithReviewCount($id);

    
    /**
     * Store book for admin
     */
    public function storeBook(array $data);

    /**
     * Get all books
     */
    public function getAllBook();
}
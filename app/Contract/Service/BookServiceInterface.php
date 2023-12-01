<?php

namespace App\Contract\Service;

use App\Models\Book;

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

    /**
     * Get All with relation and pagination
     */
    public function getAllWithRelationPagination();

    /**
     * Search by book title
     */
    public function searchByTitle($title);

    /**
     * Update book
     */
    public function updateBook(Book $book , array $data);
}
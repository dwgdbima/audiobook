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
     * Update book only for super admin
     */
    public function updateBook(Book $book , array $data);

    /**
     * Update book only for admin
     */
    public function updateBookAdmin(Book $book, array $data);
}
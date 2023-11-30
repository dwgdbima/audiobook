<?php

namespace App\Repositories;

use App\Contract\Repository\BookRepositoryInterface;
use Exception;

class BookRepository extends BaseRepository implements BookRepositoryInterface
{
    protected $modelClass = \App\Models\Book::class;

    public function storeBook(array $data)
    {
        try {
            $result = $this->modelClass::create($data);

            return $result;
        } catch (Exception $e) {
            return $e;
        }
    }

    public function getAllWithRelationPagination()
    {
        return $this->modelClass::with(['reviews' , 'products.chapters' , 'chapters'])->paginate(5)->withQueryString();
    }
}
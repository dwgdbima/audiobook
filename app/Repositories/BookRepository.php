<?php

namespace App\Repositories;

use App\Contract\Repository\BookRepositoryInterface;

class BookRepository extends BaseRepository implements BookRepositoryInterface
{
    protected $modelClass = \App\Models\Book::class;

    public function storeBook(array $data)
    {
        $result = $this->modelClass::create($data);

        return $result;
    }
}
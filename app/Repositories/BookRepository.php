<?php

namespace App\Repositories;

use App\Contract\Repository\BookRepositoryInterface;

class BookRepository extends BaseRepository implements BookRepositoryInterface
{
    protected $modelClass = \App\Models\Book::class;

}
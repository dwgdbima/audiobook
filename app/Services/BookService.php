<?php

namespace App\Services;

use App\Contract\Service\BookServiceInterface;

class BookService extends BaseService implements BookServiceInterface
{
    protected $repository = \App\Repositories\BookRepository::class;

    public function getAllWithReviewCount()
    {
        $books = $this->repository->with(['reviews'])->getAll();

        $books = $books->map(function($item, $key) {
            $item['review_amount'] = $item->reviews->count();
            $item['review_point'] = $item->reviews->count() > 0 ? $item->reviews->sum('point') / $item->reviews->count() : 0;
            return $item;
        });

        return $books;
    }
}
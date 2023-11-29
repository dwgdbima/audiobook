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
            $item['review_point'] = $item->reviews->count() > 0 ? number_format((float) $item->reviews->sum('point') / $item->reviews->count(), 1) : 0;
            
            return $item;
        });

        return $books;
    }

    public function findWithReviewCount($id)
    {
        $book = $this->repository->with(['reviews'])->find($id);

        $book['review_amount'] = $book->reviews->count();
        $book['review_point'] = $book->reviews->count() > 0 ? number_format((float) $book->reviews->sum('point') / $book->reviews->count(), 1) : 0;

        return $book;
    }


    public function storeBook(array $data)
    {
        if(isset($data['cover'])){
            $data['cover'] = $data['cover']->storeAs('Book/Cover/' . $data['title'] , 'cover-' . $data['title'] . '.jpg');
        }

        $book = $this->repository->storeBook($data);

        return $book;

    }

    public function getAllBook()
    {
        return $this->repository->getAll();
    }
}
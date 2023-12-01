<?php

namespace App\Services;

use App\Contract\Service\BookServiceInterface;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

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
        $data['cover'] = 'storage/' . $data['cover'];
        $book = $this->repository->storeBook($data);

        return $book;

    }

    public function getAllBook()
    {
        return $this->repository->getAll();
    }


    public function getAllWithRelationPagination()
    {
        $books = $this->repository->getAllWithRelationPagination();

        foreach ($books as $key => &$book) {
            $book['review_amount'] = $book->reviews->count();
            $book['review_point'] = $book->reviews->count() > 0 ? number_format((float) $book->reviews->sum('point') / $book->reviews->count(), 1) : 0;
        }

        return $books;
    }


    public function searchByTitle($title)
    {
        $books =  $this->repository->searchByTitle($title);

        foreach ($books as $key => &$book) {
            $book['review_amount'] = $book->reviews->count();
            $book['review_point'] = $book->reviews->count() > 0 ? number_format((float) $book->reviews->sum('point') / $book->reviews->count(), 1) : 0;
        }

        return $books;
    }


    public function updateBook($book , array $data)
    {
        
        if(isset($data['cover'])){
          Storage::delete(Str::after($book->cover , 'storage/'));
            $data['cover'] = $data['cover']->storeAs('Book/Cover/' . $data['title'] , 'cover-' . $data['title'] . '.jpg');
            $data['cover'] = 'storage/' . $data['cover'];
        }
       
        return $this->repository->update($book , $data);
    }
}
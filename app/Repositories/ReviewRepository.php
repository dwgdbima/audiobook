<?php

namespace App\Repositories;

use App\Contract\Repository\ReviewRepositoryInterface;

class ReviewRepository extends BaseRepository implements ReviewRepositoryInterface
{
    protected $modelClass = \App\Models\Review::class;

    public function getReviewByBookId($id)
    {
        //$reviews = $this->repository->findMany([['book_id', $id]]);
        $reviews = $this->modelClass::where('book_id', $id)
        ->orderByRaw('user_id = ' . auth()->user()->id . ' DESC')
        ->take(10)
        ->get();

        return $reviews;
    }

    
    public function expandReview($id)
    {
        $reviews = $this->modelClass::where('id' , '>' , $id)
        ->where('user_id' , '!=' , auth()->user()->id)
        ->take(10)
        ->get();

        return $reviews;
    }
}
<?php

namespace App\Repositories;

use App\Contract\Repository\ReviewRepositoryInterface;

class ReviewRepository extends BaseRepository implements ReviewRepositoryInterface
{
    protected $modelClass = \App\Models\Review::class;

    public function getReviewByBookId($id)
    {
        //$reviews = $this->repository->findMany([['book_id', $id]]);
        $reviews = $this->modelClass::with(['comments.user' , 'user'])->where('book_id', $id)
        ->orderByRaw('user_id = ' . auth()->user()->id . ' DESC')
        ->get();

        return $reviews;
    }

}
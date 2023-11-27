<?php

namespace App\Repositories;

use App\Contract\Repository\ReviewRepositoryInterface;

class ReviewRepository extends BaseRepository implements ReviewRepositoryInterface
{
    protected $modelClass = \App\Models\Review::class;

}
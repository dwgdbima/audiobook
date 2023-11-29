<?php

namespace App\Repositories;

use App\Contract\Repository\CommentRepositoryInterface;

class CommentRepository extends BaseRepository implements CommentRepositoryInterface
{
    protected $modelClass = \App\Models\Comment::class;


}
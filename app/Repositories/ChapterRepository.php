<?php

namespace App\Repositories;

use App\Contract\Repository\ChapterRepositoryInterface;

class ChapterRepository extends BaseRepository implements ChapterRepositoryInterface
{
    protected $modelClass = \App\Models\Chapter::class;

}
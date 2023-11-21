<?php

namespace App\Repositories;

use App\Contract\Repository\PromoterRepositoryInterface;
use App\Models\Promoter;

class PromoterRepository extends BaseRepository implements PromoterRepositoryInterface
{
    protected $modelClass = Promoter::class;
}
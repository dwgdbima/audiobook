<?php

namespace App\Repositories;

use App\Contract\Repository\AffiliatorRepositoryInterface;

class AffiliatorRepository extends BaseRepository implements AffiliatorRepositoryInterface
{
    protected $modelClass = \App\Models\Affiliator::class;
}
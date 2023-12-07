<?php

namespace App\Repositories;

use App\Contract\Repository\PayAffiliateRepositoryInterface;

class PayAffiliateRepository extends BaseRepository implements PayAffiliateRepositoryInterface
{
    protected $modelClass = \App\Models\PayAffiliate::class;

}
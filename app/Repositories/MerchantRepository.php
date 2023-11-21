<?php

namespace App\Repositories;

use App\Models\Merchant;
use App\Contract\Repository\MerchantRepositoryInterface;

class MerchantRepository extends BaseRepository implements MerchantRepositoryInterface
{
    protected $modelClass = Merchant::class;
}
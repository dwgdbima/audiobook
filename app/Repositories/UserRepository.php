<?php

namespace App\Repositories;

use App\Contract\Repository\UserRepositoryInterface;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserRepository extends BaseRepository implements UserRepositoryInterface
{
    protected $modelClass = \App\Models\User::class;
    
    /**
     * Check if referral code exists
     *
     * @param string $referral_code
     * 
     * @return bool
     */
    public function checkReferral($referral_code) : bool
    {
        return $this->getQuery()->where('referral_code', $referral_code)->exists();
    }

    public function test()
    {
        return $this;
    }
}
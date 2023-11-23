<?php

namespace App\Repositories;

use App\Contract\Repository\UserRepositoryInterface;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserRepository extends BaseRepository implements UserRepositoryInterface
{
    protected $modelClass = \App\Models\User::class;

    public function test()
    {
        return $this;
    }
}
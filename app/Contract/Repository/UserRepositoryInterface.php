<?php

namespace App\Contract\Repository;

interface UserRepositoryInterface extends BaseRepositoryInterface
{
    /**
     * Check Referral Exist
     *
     * @param string $referral_code
     * 
     * @return bool
     */

    public function test();
}
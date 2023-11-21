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
    public function checkReferral($referral_code) : bool;

    public function test();
}
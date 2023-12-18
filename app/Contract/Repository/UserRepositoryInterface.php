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

    public function getAllCustomer();

    public function countCustomer();

    public function searchByName(string $name);

    public function update_profile(array $data);
}
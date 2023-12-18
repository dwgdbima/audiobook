<?php

namespace App\Contract\Service;

interface AffiliatorServiceInterface extends BaseServiceInterface
{
    public function countAffiliator();

    public function getByUserId($user_id);

    public function getBalanceIpaymu($user_id);

    public function getAffiliators();

    public function searchByName(string $name);
}
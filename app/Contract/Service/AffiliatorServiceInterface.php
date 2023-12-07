<?php

namespace App\Contract\Service;

interface AffiliatorServiceInterface extends BaseServiceInterface
{
    public function getByUserId($user_id);

    public function getBalanceIpaymu($user_id);
}
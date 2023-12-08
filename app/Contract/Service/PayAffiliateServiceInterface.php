<?php

namespace App\Contract\Service;

interface PayAffiliateServiceInterface extends BaseServiceInterface
{
    public function getByUserIdAndOrderId($user_id, $order_id);
}
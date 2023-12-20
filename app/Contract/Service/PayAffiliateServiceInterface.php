<?php

namespace App\Contract\Service;

interface PayAffiliateServiceInterface extends BaseServiceInterface
{
    public function getByUserIdAndOrderId($user_id, $order_id);

    public function payAffiliate($affiliator, $payAffiliator);

    public function getSuccessByUserIdPaginated($user_id, $paginated = 10);

    public function getSuccessByUserId($user_id);
}
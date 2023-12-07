<?php

namespace App\Services;

use App\Contract\Service\PayAffiliateServiceInterface;
use App\Ipaymu\Ipaymu;

class PayAffiliateService extends BaseService implements PayAffiliateServiceInterface
{
    protected $repository = \App\Repositories\PayAffiliateRepository::class;

    public function payAffiliate()
    {
        Ipaymu::init([
            'env'               => env('IPAYMU_ENV'),
            'virtual_account'   => env('IPAYMU_VA'),
            'api_key'           => env('IPAYMU_KEY')
        ]);
    }

    public function getByUserIdAndOrderId($user_id, $order_id)
    {
        return $this->repository->findFirst([['user_id', $user_id], ['order_id', $order_id]]);
    }
}
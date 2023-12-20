<?php

namespace App\Services;

use App\Contract\Service\PayAffiliateServiceInterface;
use App\Ipaymu\Ipaymu;
use App\Ipaymu\IpaymuSplitPayment;

class PayAffiliateService extends BaseService implements PayAffiliateServiceInterface
{
    protected $repository = \App\Repositories\PayAffiliateRepository::class;

    public function payAffiliate($affiliator, $payAffiliate)
    {
        Ipaymu::init([
            'env'               => env('IPAYMU_ENV'),
            'virtual_account'   => env('IPAYMU_VA'),
            'api_key'           => env('IPAYMU_KEY')
        ]);

        $splitPayment = IpaymuSplitPayment::split([
            'sender' => env('IPAYMU_VA'),
            'receiver' => $affiliator->ipaymu_va,
            'amount' => $payAffiliate->amount + 150,
            'referenceId' => $payAffiliate->id,
        ]);

        if($splitPayment['Status'] == 200){
            $this->update($payAffiliate->id, ['status' => 1]);
        }
    }

    public function getByUserIdAndOrderId($user_id, $order_id)
    {
        return $this->repository->findFirst([['user_id', $user_id], ['order_id', $order_id]]);
    }

    public function getSuccessByUserIdPaginated($user_id, $paginated = 10)
    {
        return $this->repository->with(['order.user'])->getFilteredPaginated([['user_id', $user_id], ['status', 1]], $paginated);
    }

    public function getSuccessByUserId($user_id)
    {
        return $this->repository->findMany([['user_id', $user_id], ['status', 1]]);
    }
}
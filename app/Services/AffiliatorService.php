<?php

namespace App\Services;

use App\Contract\Repository\AffiliatorRepositoryInterface;
use App\Contract\Repository\UserRepositoryInterface;
use App\Contract\Service\AffiliatorServiceInterface;
use App\Contract\Service\AuthServiceInterface;
use App\Exceptions\Service\ServiceException;
use App\Ipaymu\Ipaymu;
use App\Ipaymu\IpaymuBalance;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;

class AffiliatorService extends BaseService implements AffiliatorServiceInterface
{
    // protected $repository = \App\Contract\Repository\AffiliatorRepositoryInterface::class;
    protected $authService, $userRepository;

    public function __construct(AffiliatorRepositoryInterface $affiliatorRepositoryInterface, AuthServiceInterface $authServiceInterface, UserRepositoryInterface $userRepository)
    {
        $this->repository = $affiliatorRepositoryInterface;
        $this->authService = $authServiceInterface;
        $this->userRepository = $userRepository;
    }

    /**
     * Create model
     *
     * @param array $data
     * @return Model|null
     * @throws ServiceException
     */
    public function create(array $data): ?Model
    {
        $singleSignOnIpaymu = $this->authService->singleSignOnIpaymu([
            'name' => $data['name'],
            'email' => $data['email'],
            'phone' => $data['phone'],
            'password' => $data['password'],
        ])['Data'];

        $model = $this->repository->create([
            'user_id' => $data['user_id'],
            'referral_code' => $this->genReferralCode(),
            'ipaymu_email' => $singleSignOnIpaymu['Email'],
            'ipaymu_va' => $singleSignOnIpaymu['Va'],
        ]);

        $user = $this->userRepository->find($model->user_id);

        $user->assignRole('affiliator');

        return $model;
    }

    /**
     * Method genReferral
     *
     * @param $prefix $prefix
     *
     * @return void
     */
    public function genReferralCode()
    {
        // dd($this->repository->findFirst([['referral_code', '123456']]));
        $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersNumber = strlen($characters);
        $codeLength = 6;
    
        $code = '';
    
        while (strlen($code) < 6) {
            $position = rand(0, $charactersNumber - 1);
            $character = $characters[$position];
            $code = $code.$character;
        }
    
        if ($this->repository->findFirst([['referral_code', $code]])) {
            $this->genReferralCode();
        }
    
        return $code;
    }

    public function getByUserId($user_id)
    {
        return $this->repository->findFirst([['user_id', $user_id]]);
    }

    public function getBalanceIpaymu($user_id)
    {
        $affiliator = $this->getByUserId($user_id);
        Ipaymu::init([
            'env'               => env('IPAYMU_ENV'),
            'virtual_account'   => env('IPAYMU_VA'),
            'api_key'           => env('IPAYMU_KEY')
        ]);

        return IpaymuBalance::getBalance($affiliator->ipaymu_va);
    }
}
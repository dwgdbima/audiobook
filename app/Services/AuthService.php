<?php

namespace App\Services;

use App\Contract\Repository\MerchantRepositoryInterface;
use App\Contract\Repository\PromoterRepositoryInterface;
use App\Contract\Repository\UserRepositoryInterface;
use App\Contract\Service\AuthServiceInterface;
use App\Ipaymu\Ipaymu;
use App\Ipaymu\IpaymuRegister;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Events\Verified;
use Illuminate\Contracts\Auth\Factory;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthService implements AuthServiceInterface
{
    protected $userRepository, $promoterRepository, $merchantRepository;
    
    public function __construct(UserRepositoryInterface $userRepositoryInterface, PromoterRepositoryInterface $promoterRepositoryInterface, MerchantRepositoryInterface $merchantRepositoryInterface)
    {
        $this->userRepository = $userRepositoryInterface;
        $this->promoterRepository = $promoterRepositoryInterface;
        $this->merchantRepository = $merchantRepositoryInterface;
    }

    /**
     * Register user
     *
     * @param array $data
     *
     * @return object
     */
    public function register(array $data)
    {
        $user = $this->userRepository->create([
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'referral_code' => $this->genReferral(),
            'status' => 1,
            'reg_ip' => request()->ip(),
        ]);

        $user->assignRole($data['role']);

        $userDetail = [
            'user_id' => $user->id,
            'name' => $data['name'],
            'phone' => $data['phone'],
            'ipaymu_email' => $data['email'],
            'ipaymu_va' => 337,
            'ipaymu_key' => 337,
            'ipaymu_qrcode' => 337,
        ];

        $data['role'] == 'promoter' ? $this->promoterRepository->create($userDetail) : $this->merchantRepository->create($userDetail);

        event(new Registered($user));

        return $user;
    }

    public function verifyUrl($id, $hash)
    {
        if (! hash_equals((string) $id, (string) Auth::user()->id)) {
            throw new AuthorizationException;
        }

        if (! hash_equals((string) $hash, sha1(Auth::user()->email))) {
            throw new AuthorizationException;
        }
    }

    public function verifyConfirmation($password)
    {
        $user = $this->userRepository->find(Auth::id());
        
        if(Hash::check($password, $user->password)){
            $config = [
                'env'               => env('IPAYMU_ENV'),
                'virtual_account'   => env('IPAYMU_VA'),
                'api_key'           => env('IPAYMU_KEY')
            ];

            Ipaymu::init($config);

            Ipaymu::setUser([
                'name' => $user->name,
                'email' => $user->email,
                'phone' => $user->phone,
                'password' => $password,
            ]);

            $ipaymu = IpaymuRegister::create();

            $updateIpaymu = [
                'ipaymu_key' => $ipaymu['Data']['ApiKey'],
                'ipaymu_va' => $ipaymu['Data']['Va'],
                'ipaymu_qrcode' => $ipaymu['Data']['Va'],
            ];

            if($user->hasRole('merchant')){
                $this->merchantRepository->update($this->merchantRepository->findFirst([['user_id', $user->id]]), $updateIpaymu);
            }else{
                $this->promoterRepository->update($this->promoterRepository->findFirst([['user_id', $user->id]]), $updateIpaymu);
            }

            $user->markEmailAsVerified();

            event(new Verified($user));

            return $user;
        }
    }

    /**
     * Method genReferral
     *
     * @param $prefix $prefix
     *
     * @return void
     */
    public function genReferral($prefix = null)
    {
        $prefix = $prefix ?? 'viral';
        $referral_code = $prefix . rand(100000, 999999);

        $result   = $this->userRepository->checkReferral($referral_code);

        while ($result) {
            $referral_code    = $prefix . rand(100000, 999999);
            $result  = $this->userRepository->checkReferral($referral_code);
        }

        return $referral_code;
    }

    public function test()
    {
        // $user = $this->promoterRepository->update(, ['email' => 'dewagedebima@gmail.com']);

        return $this->promoterRepository->findFirst([['user_id', 1]]);
    }
}
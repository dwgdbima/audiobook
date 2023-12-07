<?php

namespace App\Services;

use App\Contract\Repository\AffiliatorRepositoryInterface;
use App\Contract\Repository\UserRepositoryInterface;
use App\Contract\Service\AffiliatorServiceInterface;
use App\Contract\Service\AuthServiceInterface;
use App\Ipaymu\IpaymuRegister;
use App\Models\User;
use Exception;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Events\Verified;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;

class AuthService implements AuthServiceInterface
{
    protected $userRepository, $affiliatorRepository;
    
    public function __construct(UserRepositoryInterface $userRepositoryInterface, AffiliatorRepositoryInterface $affiliatorRepositoryInterface)
    {
        $this->userRepository = $userRepositoryInterface;
        $this->affiliatorRepository = $affiliatorRepositoryInterface;
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
        $fill = [
            'name' => $data['name'],
            'email' => $data['email'],
            'phone' => $data['phone'],
            'password' => Hash::make($data['password']), 
        ];

        if(Cookie::has('referral')){
            $referral_code = Crypt::decrypt(Cookie::get('referral'));
            $affiliator = $this->affiliatorRepository->findFirst([['referral_code', $referral_code]]);
            if($affiliator->exists()){
                $fill['referrer_id'] = $affiliator->user_id;
            }
        }

        if($data['referral']){
            $referral_code = Crypt::decrypt($data['referral']);
            $affiliator = $this->affiliatorRepository->findFirst([['referral_code', $referral_code]]);
            if($affiliator->exists()){
                $fill['referrer_id'] = $affiliator->user_id;
            }
        }

        $user = $this->userRepository->create($fill);

        $user->assignRole('customer');

        event(new Registered($user));

        return $user;
    }

    public function verifyEmail($id, $hash)
    {
        if (! hash_equals((string) $id, (string) Auth::user()->id)) {
            throw new AuthorizationException;
        }

        if (! hash_equals((string) $hash, sha1(Auth::user()->email))) {
            throw new AuthorizationException;
        }

        $user = User::find(auth()->id());

        $user->markEmailAsVerified();

        event(new Verified($user));

        return $user;
    }


    public function changePassword(array $data)
    {
       try {
            $data['password'] = Hash::make($data['password']);
            auth()->user()->update(['password' => $data['password']]);

            return true;
       } catch (Exception $e) {
            return $e->getMessage();
       }
    }

    public function singleSignOnIpaymu($data)
    {
        return IpaymuRegister::create($data);
    }

    public function test()
    {

    }
}
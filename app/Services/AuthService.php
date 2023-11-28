<?php

namespace App\Services;

use App\Contract\Repository\MerchantRepositoryInterface;
use App\Contract\Repository\PromoterRepositoryInterface;
use App\Contract\Repository\UserRepositoryInterface;
use App\Contract\Service\AuthServiceInterface;
use App\Ipaymu\Ipaymu;
use App\Ipaymu\IpaymuRegister;
use App\Models\User;
use Exception;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Events\Verified;
use Illuminate\Contracts\Auth\Factory;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthService implements AuthServiceInterface
{
    protected $userRepository;
    
    public function __construct(UserRepositoryInterface $userRepositoryInterface)
    {
        $this->userRepository = $userRepositoryInterface;
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
            'name' => $data['name'],
            'email' => $data['email'],
            'phone' => $data['phone'],
            'password' => Hash::make($data['password']),
        ]);

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


    public function test()
    {

    }
}
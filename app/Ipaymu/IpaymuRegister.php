<?php

namespace App\Ipaymu;

use App\Traits\IpaymuApiOperations;
use App\Validations\IpaymuRegisterValidation;

class IpaymuRegister
{
    use IpaymuApiOperations;

    public function __construct()
    {
        
    }

    /**
     * @return mixed
     */
    public static function create(array $user)
    {
        Ipaymu::init([
            'env'               => env('IPAYMU_ENV'),
            'virtual_account'   => env('IPAYMU_VA'),
            'api_key'           => env('IPAYMU_KEY')
        ]);
        
        $url = '/api/v2/register';

        return self::_request('POST', $url, $user);
    }
}
<?php

namespace App\Ipaymu;

use App\Traits\IpaymuApiOperations;
use App\Validations\IpaymuRegisterValidation;

class IpaymuRegister
{
    use IpaymuApiOperations;

    /**
     * @return mixed
     */
    public static function create(array $user = [])
    {
        $user = Ipaymu::getUser();
        $user['validEmail'] = true;

        $url = '/api/v2/register';

        return self::_request('POST', $url, $user);
    }
}
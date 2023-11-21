<?php

namespace App\Traits;

use App\Exceptions\IpaymuInvalidApiKeyException;
use App\Exceptions\IpaymuInvalidArgumentException;
use App\Ipaymu\Ipaymu;
use App\Ipaymu\IpaymuRegister;

trait IpaymuRegistration
{
    public function __construct()
    {

    }

        /**
     * Validate post data.
     * Store to DB if there are no errors.
     *
     * @param array $data
     * @return Object
     */
    public function registerIpaymu($data)
    {
        $config = [
            'env'               => env('IPAYMU_ENV'),
            'virtual_account'   => env('IPAYMU_VA'),
            'api_key'           => env('IPAYMU_KEY')
        ];
    
        try {
            Ipaymu::init($config);

            $ipaymuUser = [
                'name'  => $data['name'],
                'email' => $data['email'],
                'phone' => $data['phone'],
                'password' => $data['password'],
            ];
    
            Ipaymu::setUser($ipaymuUser);
        
            $register = IpaymuRegister::create($ipaymuUser);

            $result['status'] = true;
            $result['message'] = 'Akun berhasil terdaftar ipaymu';
            $result['data'] = $register['Data'];
            return $result;
        } catch (IpaymuInvalidApiKeyException $e) {
            return $e->getMessage();
        } catch (IpaymuInvalidArgumentException $e) {
            return $e->getMessage();
        }
    }
}
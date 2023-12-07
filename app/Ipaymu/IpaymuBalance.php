<?php

namespace App\Ipaymu;

use App\Traits\IpaymuApiOperations;
use App\Constants\IpaymuTypes;
use App\Exceptions\IpaymuInvalidArgumentException;

class IpaymuBalance
{
    use IpaymuApiOperations;

    /**
     * @param string|null $format
     *
     * @return bool
     */
    public static function validateFormat(string $format = null): bool
    {
        if (!in_array($format, IpaymuTypes::$FORMAT)) {
            $msg = 'Format is invalid. Available types: '.implode(' ', IpaymuTypes::$FORMAT);

            throw new IpaymuInvalidArgumentException($msg);
        }

        return true;
    }

    /**
     * @param string|null $format
     *
     * @return mixed
     */
    public static function getBalance($va, string $format = 'json')
    {
        // $data = [];
        // $data['key'] = Ipaymu::getApiKey();
        // if (!empty($format)) {
        //     self::validateFormat($format);
        //     $data['format'] = $format;
        // }
        // $params = http_build_query($data);

        // $url = '/api/saldo?'.$params;

        $body = [
            'account' => $va
        ];

        $url = '/api/v2/balance';

        return static::_request('POST', $url, $body);
    }
}
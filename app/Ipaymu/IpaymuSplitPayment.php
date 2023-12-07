<?php

namespace App\Ipaymu;

use App\Traits\IpaymuApiOperations;

class IpaymuSplitPayment
{
    use IpaymuApiOperations;

    public static function split($data)
    {
        $body = [
            'sender' => $data['sender'],
            'receiver' => $data['receiver'],
            'amount' => $data['amount'],
            'referenceId' => $data['referenceId'],
        ];

        $url = '/api/v2/transferva';

        return static::_request('POST', $url, $body);
    }
}
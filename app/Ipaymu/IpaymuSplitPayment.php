<?php

namespace App\Ipaymu;

use App\Traits\IpaymuApiOperations;

class IpaymuSplitPayment
{
    use IpaymuApiOperations;

    public static function split($data)
    {
        $body = [
            'sender' => $data['ipaymu_va'],
            'receiver' => $data['receiver_va'],
            'amount' => $data['amount'],
            'referenceId' => $data['pay_affiliate_id'],
        ];

        $url = '/api/v2/transferva';

        return static::_request('POST', $url, $body);
    }
}
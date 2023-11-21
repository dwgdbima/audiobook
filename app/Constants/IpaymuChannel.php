<?php
namespace App\Constants;

class IpaymuChannel
{
    /**
     * @var array|\string[][]
     */
    public static array $DIRECT = [
        'va'            => ['bag', 'bni', 'cimb', 'mandiri'],
        'banktransfer'  => ['bca'],
        'cstore'        => ['indomaret', 'alfamart'],
        'cod'           => ['rpx'],
        'qris'          => ['linkaja'],
        'paylater'      => ['akulaku'],
    ];

    /**
     * @var array|\string[][]
     */
    public static array $REDIRECT = [
        'cstore' => ['indomaret', 'alfamart'],
    ];
}
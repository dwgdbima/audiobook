<?php

namespace App\Constants;

class IpaymuTypes
{
    /**
     * @var string[]
     */
    public static array $ENV = ['SANDBOX', 'PRODUCTION'];

    /**
     * @var string[]
     */
    public static array $FORMAT = ['xml', 'json'];

    /**
     * @var string[]
     */
    public static array $EXPIRED = ['seconds', 'minutes', 'hours', 'days'];
}
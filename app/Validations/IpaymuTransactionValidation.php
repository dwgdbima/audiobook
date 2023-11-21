<?php
namespace App\Validations;

use App\Constants\IpaymuTypes;
use App\Exceptions\IpaymuInvalidArgumentException;

class TransactionValidation
{
    /**
     * @param string $expiredType
     *
     * @return bool
     */
    public static function validateExpiredType(string $expiredType): bool
    {
        if (!in_array($expiredType, IpaymuTypes::$EXPIRED)) {
            $msg = 'Expired Type is invalid. Available types: '.implode(', ', IpaymuTypes::$EXPIRED);

            throw new IpaymuInvalidArgumentException($msg);
        }

        return true;
    }
}
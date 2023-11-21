<?php
namespace App\Validations;

use App\Exceptions\IpaymuInvalidArgumentException;

class IpaymuRegisterValidation
{
    /**
     * @param array $user
     *
     * @return bool
     */
    public static function validateField(array $user = []): bool
    {
        if (!array_key_exists('name', $user)) {
            $msg = 'Payload {name} is Required.';

            throw new IpaymuInvalidArgumentException($msg);
        }

        if (!array_key_exists('email', $user)) {
            $msg = 'Payload {email} is Required.';

            throw new IpaymuInvalidArgumentException($msg);
        }

        if (!array_key_exists('phone', $user)) {
            $msg = 'Payload {phone} is Required.';

            throw new IpaymuInvalidArgumentException($msg);
        }

        if (!array_key_exists('password', $user)) {
            $msg = 'Payload {password} is Required.';

            throw new IpaymuInvalidArgumentException($msg);
        }

        return true;
    }
}
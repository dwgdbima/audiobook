<?php
namespace App\Validations;

use App\Exceptions\IpaymuInvalidArgumentException;

class IpaymuCustomerValidation
{
    /**
     * @param array $customer
     *
     * @return bool
     */
    public static function validateField(array $customer = []): bool
    {
        if (!array_key_exists('name', $customer)) {
            $msg = 'Payload {name} is Required.';

            throw new IpaymuInvalidArgumentException($msg);
        }

        if (!array_key_exists('email', $customer)) {
            $msg = 'Payload {email} is Required.';

            throw new IpaymuInvalidArgumentException($msg);
        }

        if (!array_key_exists('phone', $customer)) {
            $msg = 'Payload {phone} is Required.';

            throw new IpaymuInvalidArgumentException($msg);
        }

        return true;
    }
}
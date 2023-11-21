<?php
namespace App\Validations;

use App\Constants\IpaymuChannel;
use App\Exceptions\IpaymuInvalidArgumentException;
use App\Ipaymu\Ipaymu;

class IpaymuPaymentRedirectValidation
{
    /**
     * @param array $product
     *
     * @return bool
     */
    public static function validateProduct(array $product = []): bool
    {
        if (!array_key_exists('name', $product)) {
            $msg = 'Payload {name} is Required.';

            throw new IpaymuInvalidArgumentException($msg);
        }

        if (!array_key_exists('qty', $product)) {
            $msg = 'Payload {qty} is Required.';

            throw new IpaymuInvalidArgumentException($msg);
        }

        if (!array_key_exists('price', $product)) {
            $msg = 'Payload {price} is Required.';

            throw new IpaymuInvalidArgumentException($msg);
        }

        return true;
    }

    /**
     * @param array $body
     *
     * @return bool
     */
    public static function validateField(array $body = []): bool
    {
        $notifyUri = Ipaymu::getNotifyUri();
        if (empty($notifyUri)) {
            $msg = 'Notify Uri is Required.';

            throw new IpaymuInvalidArgumentException($msg);
        }

        $cancelUri = Ipaymu::getCancelUri();
        if (empty($cancelUri)) {
            $msg = 'Cancel Uri is Required.';

            throw new IpaymuInvalidArgumentException($msg);
        }

        $returnUri = Ipaymu::getReturnUri();
        if (empty($returnUri)) {
            $msg = 'Return Uri is Required.';

            throw new IpaymuInvalidArgumentException($msg);
        }

        if (array_key_exists('expiredType', $body)) {
            TransactionValidation::validateExpiredType($body['expiredType']);
        }

        return true;
    }

    /**
     * @param string $paymentMethod
     * @param string $channel
     *
     * @return bool
     */
    public static function validateChannel(string $paymentMethod, string $channel): bool
    {
        if (empty($channel)) {
            $msg = 'Channel not empty! Available channel: '.implode(', ', IpaymuChannel::$REDIRECT[$paymentMethod]);

            throw new IpaymuInvalidArgumentException($msg);
        }

        if (!in_array($channel, IpaymuChannel::$REDIRECT[$paymentMethod])) {
            $msg = "Channel {$channel} is invalid. Available channel: ".implode(', ', IpaymuChannel::$REDIRECT[$paymentMethod]);

            throw new IpaymuInvalidArgumentException($msg);
        }

        return true;
    }
}
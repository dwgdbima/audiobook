<?php

namespace App\Ipaymu;

use App\Helpers\IpaymuArr;
use App\Traits\IpaymuApiOperations;
use App\Validations\IpaymuPaymentRedirectValidation;
use App\Ipaymu\Ipaymu;

class PaymentRedirect
{
    use IpaymuApiOperations;

    /**
     * @var null
     */
    private static $instance = null;

    /**
     * @var array
     */
    private static array $payload = [];

    /**
     * @var string
     */
    private static string $paymentMethod = '';

    /**
     * @var string
     */
    private static string $uri = '/api/v2/payment';

    /**
     * @return array
     */
    public static function getPayload(): array
    {
        return self::$payload;
    }

    /**
     * @param array $payload
     */
    private static function setPayload(array $payload): void
    {
        self::$payload = $payload;
    }

    /**
     * @return string
     */
    public static function getPaymentMethod(): string
    {
        return self::$paymentMethod;
    }

    /**
     * @param string $paymentMethod
     */
    private static function setPaymentMethod(string $paymentMethod): void
    {
        self::$paymentMethod = $paymentMethod;
    }

    /**
     * @return static
     */
    public static function BAGVA()
    {
        if (self::$instance == null) {
            self::$instance = new self();
        }

        self::setPaymentMethod('bagva');

        return new static();
    }

    /**
     * @return static
     */
    public static function BNIVA()
    {
        if (self::$instance == null) {
            self::$instance = new self();
        }

        self::setPaymentMethod('bniva');

        return new static();
    }

    /**
     * @return static
     */
    public static function mandiriVA()
    {
        if (self::$instance == null) {
            self::$instance = new self();
        }

        self::setPaymentMethod('mandiriva');

        return new static();
    }

    /**
     * @return static
     */
    public static function niagaVA()
    {
        if (self::$instance == null) {
            self::$instance = new self();
        }

        self::setPaymentMethod('niagava');

        return new static();
    }

    /**
     * @return static
     */
    public static function BCATransfer()
    {
        if (self::$instance == null) {
            self::$instance = new self();
        }

        self::setPaymentMethod('bcatransfer');

        return new static();
    }

    /**
     * @return static
     */
    public static function creditCard()
    {
        if (self::$instance == null) {
            self::$instance = new self();
        }

        self::setPaymentMethod('cc');

        return new static();
    }

    /**
     * @param array $payloadCOD
     *
     * @return static
     */
    public static function COD(array $payloadCOD = [])
    {
        if (self::$instance == null) {
            self::$instance = new self();
        }

        self::setPaymentMethod('cod');

        if (in_array('dimension', Ipaymu::getProducts())) {
            self::$payload['dimension'] = IpaymuArr::pluck(Ipaymu::getProducts(), 'dimension');
        }
        if (in_array('weight', Ipaymu::getProducts())) {
            self::$payload['weight'] = IpaymuArr::pluck(Ipaymu::getProducts(), 'weight');
        }
        if (!empty($payloadCOD)) {
            self::$payload = IpaymuArr::merge($payloadCOD, self::$payload);
        }

        return new static();
    }

    /**
     * @param string $channel
     *
     * @return static
     */
    public static function CStore(string $channel = 'alfamart')
    {
        if (self::$instance == null) {
            self::$instance = new self();
        }

        self::setPaymentMethod('cstore');

        IpaymuPaymentRedirectValidation::validateChannel(self::getPaymentMethod(), $channel);

        return new static();
    }

    /**
     * @return static
     */
    public static function akulaku()
    {
        if (self::$instance == null) {
            self::$instance = new self();
        }

        self::setPaymentMethod('akulaku');

        return new static();
    }

    /**
     * @return static
     */
    public static function QRIS()
    {
        if (self::$instance == null) {
            self::$instance = new self();
        }

        self::setPaymentMethod('qris');

        return new static();
    }

    /**
     * @param array $payloadTrx
     *
     * @return mixed
     */
    public static function create(array $payloadTrx = [])
    {
        $payload = self::$payload;

        $customer = Ipaymu::getCustomer();
        if (!empty($customer)) {
            $payload['buyerName'] = $customer['name'];
            $payload['buyerEmail'] = $customer['email'];
            $payload['buyerPhone'] = $customer['phone'];
        }

        $payload['product'] = IpaymuArr::pluck(Ipaymu::getProducts(), 'name');
        $payload['qty'] = IpaymuArr::pluck(Ipaymu::getProducts(), 'qty');
        $payload['price'] = IpaymuArr::pluck(Ipaymu::getProducts(), 'price');
        $payload['description'] = IpaymuArr::pluck(Ipaymu::getProducts(), 'description');
        $payload['notifyUrl'] = Ipaymu::getNotifyUri();
        $payload['returnUrl'] = Ipaymu::getReturnUri();
        $payload['cancelUrl'] = Ipaymu::getCancelUri();
        $payload['amount'] = IpaymuArr::sum((array) IpaymuArr::pluck(Ipaymu::getProducts(), 'price')) + Ipaymu::getDeliveryFee();

        if (!empty($payloadTrx)) {
            $payload = IpaymuArr::merge($payload, $payloadTrx);
        }

        IpaymuPaymentRedirectValidation::validateField($payload);

        return self::_request('POST', self::$uri, $payload);
    }
}
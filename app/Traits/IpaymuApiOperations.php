<?php
namespace App\Traits;

use App\Ipaymu\Ipaymu;
use App\Exceptions\IpaymuInvalidApiKeyException;
use Illuminate\Support\Facades\Log;

trait IpaymuApiOperations
{
    /**
     * @param array $body
     * @param $method
     *
     * @return string
     */
    private static function generateSignature(array $body, $method): string
    {
        $va = Ipaymu::getVirtualAccount();
        $secret = Ipaymu::getApiKey();

        $jsonBody = json_encode($body, JSON_UNESCAPED_SLASHES);
        $requestBody = strtolower(hash('sha256', $jsonBody));
        $stringToSign = strtoupper($method).':'.$va.':'.$requestBody.':'.$secret;

        return hash_hmac('sha256', $stringToSign, $secret);
    }

    /**
     * @param string $method
     * @param string $pathUrl
     * @param array  $params
     *
     * @return mixed
     */
    private static function _request(string $method, string $pathUrl, array $params = [])
    {
        $method = strtoupper($method);
        $url = Ipaymu::getBaseUri().$pathUrl;
        $signature = self::generateSignature($params, $method);
        $timestamp = date('YmdHis');

        $headers = [
            'Accept: application/json',
            'Content-Type: application/json',
            'va: '.Ipaymu::getVirtualAccount(),
            'signature: '.$signature,
            'timestamp: '.$timestamp,
        ];

        $jsonBody = json_encode($params, JSON_UNESCAPED_SLASHES);

        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => $jsonBody,
            CURLOPT_HTTPHEADER => $headers,
        ));

        $err = curl_error($curl);
        $ret = curl_exec($curl);
        curl_close($curl);
        if ($err) {
            Log::error($err);
            return $err;
        } else {
            $ret = json_decode($ret, true);
            if (@$ret->Status === -1001 || @$ret->Status === 401) {
                $msg = $ret->Status === -1001 ? $ret->Keterangan : '';
                $msg = $ret->Status === 401 ? $ret->Message : $msg;

                throw new IpaymuInvalidApiKeyException($msg);
            }
            Log::info($ret);
            return $ret;
        }

        // $ch = curl_init($url);
        // curl_setopt($ch, CURLOPT_HEADER, false);
        // curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

        // curl_setopt($ch, CURLOPT_POST, count($params));
        // curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonBody);

        // curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        // curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        // curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
        // $err = curl_error($ch);
        // $ret = curl_exec($ch);
        // curl_close($ch);
        // if ($err) {

        //     return $err;
        // } else {
        //     $ret = json_decode($ret, true);
        //     if (@$ret->Status === -1001 || @$ret->Status === 401) {
        //         $msg = $ret->Status === -1001 ? $ret->Keterangan : '';
        //         $msg = $ret->Status === 401 ? $ret->Message : $msg;

        //         throw new IpaymuInvalidApiKeyException($msg);
        //     }

        //     return $ret;
        // }
    }
}
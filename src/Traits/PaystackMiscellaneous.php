<?php
/**
 * Created by PhpStorm.
 * User: Adesubomi
 * Date: 2/20/18
 * Time: 1:20 AM
 */

namespace Adesubomi\Larastack\Traits;

use Adesubomi\Larastack\Classes\PaystackApi;
use Adesubomi\Larastack\Exception\LarastackTransportException;

trait PaystackMiscellaneous
{

    /**
     * @param $accountNumber
     * @param string $bankCode
     * @return mixed
     * @throws LarastackTransportException
     */
    public function resolveAccountNumber(string $accountNumber, string $bankCode)
    {

        try {
            $endpoint = PaystackApi::url('bank/resolve');
            $response = $this->client->get($endpoint, [
                'headers' => $this->headers,
                'query' => [
                    'account_number' => $accountNumber,
                    'bank_code' => $bankCode,
                ]
            ]);


            $responseBody = json_decode($response->getBody(), true);
            $this->testResponseBody($responseBody);
            return $responseBody['data'];
        }
        catch (\Exception $exception) {

            throw (new LarastackTransportException($exception->getMessage()));
        }

    }

    /**
     * Resolves and returns BVN information
     * @param string $bvn
     * @return mixed
     * @throws LarastackTransportException
     */
    public function resolveBvn(string $bvn)
    {

        try {
            $response = $this->client->get("https://api.paystack.co/bank/resolve_bvn/". $bvn, [
                'headers' => $this->headers
            ]);

            $responseBody = json_decode($response->getBody(), true);
            $this->testResponseBody($responseBody);
            return $responseBody['data'];
        }
        catch (\Exception $exception) {

            throw (new LarastackTransportException($exception->getMessage()));
        }
    }

    /**
     * Gets a list of all commercial banks on Paystack platform.
     * This is assumed to be all commercial banks operational in Nigeria.
     * @return string
     * @throws LarastackTransportException
     */
    public function listBanks()
    {
        try {

            $endpoint = PaystackApi::url('bank');
            $response = $this->client->get($endpoint, [
                'headers' => $this->headers
            ]);

            $responseBody = json_decode($response->getBody(), true);
            $this->testResponseBody($responseBody);
            return $responseBody['data'];

        }
        catch (\Exception $exception) {
            throw (new LarastackTransportException($exception->getMessage()));
        }
    }
}
<?php
/**
 * Created by PhpStorm.
 * User: Adesubomi
 * Date: 2/20/18
 * Time: 1:20 AM
 */

namespace Adesubomi\Larastack\Classes;


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
            $response = $this->client->request('GET', 'https://api.paystack.co/bank/resolve', [
                'headers' => $this->authorization,
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
            $response = $this->client->request('GET', "https://api.paystack.co/bank/resolve_bvn/". $bvn, [
                'headers' => $this->authorization
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

            $response = $this->client->request('GET', "https://api.paystack.co/bank", [
                'headers' => $this->authorization
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
<?php
/**
 * Created by PhpStorm.
 * User: Adesubomi
 * Date: 2/20/18
 * Time: 1:10 AM
 */

namespace Adesubomi\Larastack\Classes;


use Adesubomi\Larastack\Exception\LarastackTransportException;

trait PaystackTransfer
{

    public function getBalance()
    {
        try {

            $response = $this->client->request('GET', "https://api.paystack.co/balance", [
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
     * Gets a list of transfers made from this account
     * @return mixed
     * @throws LarastackTransportException
     */
    public function listTransfers()
    {
        try {

            $response = $this->client->request('GET', "https://api.paystack.co/transfer", [
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
     * Fetches and returns a particular transfer using transfer_code
     * @param string $transfer_code
     * @return mixed
     * @throws LarastackTransportException
     */
    public function fetchTransfer(string $transfer_code)
    {
        try {

            $response = $this->client->request('GET', "https://api.paystack.co/transfer/". $transfer_code, [
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
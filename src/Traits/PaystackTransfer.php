<?php
/**
 * Created by PhpStorm.
 * User: Adesubomi
 * Date: 2/20/18
 * Time: 1:10 AM
 */

namespace Adesubomi\Larastack\Traits;


use Adesubomi\Larastack\Exception\LarastackTransportException;

trait PaystackTransfer
{

    public function checkBalance()
    {
        try {

            $response = $this->client->get("https://api.paystack.co/balance", [
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
     * Alias of checkBalance
     */
    public function getBalance()
    {
        return $this->checkBalance();
    }

    /**
     * Gets a list of transfers made from this account
     * @return mixed
     * @throws LarastackTransportException
     */
    public function listTransfers()
    {
        try {

            $response = $this->client->get("https://api.paystack.co/transfer", [
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
     * Fetches and returns a particular transfer using transfer_code
     * @param string $transfer_code
     * @return mixed
     * @throws LarastackTransportException
     */
    public function fetchTransfer(string $transfer_code)
    {
        try {

            $response = $this->client->get("https://api.paystack.co/transfer/". $transfer_code, [
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
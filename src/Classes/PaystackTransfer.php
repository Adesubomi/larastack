<?php
/**
 * Created by PhpStorm.
 * User: Adesubomi
 * Date: 2/20/18
 * Time: 1:10 AM
 */

namespace Adesubomi\Larastack\Classes;


trait PaystackTransfer
{

    public function checkBalance()
    {
        try {

            $response = $this->client->request('GET', "https://api.paystack.co/balance", [
                'headers' => $this->authorization
            ]);

            return $response->getBody();

        }
        catch (\Exception $exception) {

            return $exception->getMessage();
        }
    }

    /**
     * Alias for checkBalance()
     * @return string
     */
    public function getBalance()
    {
        return $this->checkBalance();
    }

    public function listTransfers()
    {
        try {

            $response = $this->client->request('GET', "https://api.paystack.co/transfer", [
                'headers' => $this->authorization
            ]);

            return $response->getBody();

        }
        catch (\Exception $exception) {

            return $exception->getMessage();
        }
    }

    public function fetchTransfer(string $transfer_code)
    {
        try {

            $response = $this->client->request('GET', "https://api.paystack.co/transfer/". $transfer_code, [
                'headers' => $this->authorization
            ]);

            return $response->getBody();

        }
        catch (\Exception $exception) {

            return $exception->getMessage();
        }
    }
}
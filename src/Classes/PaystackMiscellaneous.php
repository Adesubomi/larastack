<?php
/**
 * Created by PhpStorm.
 * User: Adesubomi
 * Date: 2/20/18
 * Time: 1:20 AM
 */

namespace Adesubomi\Larastack\Classes;


trait PaystackMiscellaneous
{

    public function resolveAccountNumber($accountNumber, string $bankCode)
    {

        try {
            $response = $this->client->request('GET', 'https://api.paystack.co/bank/resolve', [
                'headers' => $this->authorization,
                'query' => [
                    'account_number' => $accountNumber,
                    'bank_code' => $bankCode,
                ]
            ]);

            return $response->getBody();
        }
        catch (\Exception $exception) {

            return $exception->getMessage();
        }

    }

    public function resolveBvn(string $bvn)
    {

        try {
            $response = $this->client->request('GET', $this->url()->resolveBvn($bvn), [
                'headers' => $this->authorization
            ]);

            return $response->getBody();
        }
        catch (\Exception $exception) {

            return $exception->getMessage();
        }
    }

    public function banks()
    {
        try {

            $response = $this->client->request('GET', $this->url()->listBanks(), [
                'headers' => $this->authorization
            ]);

            return $response->getBody();

        }
        catch (\Exception $exception) {

            return $exception->getMessage();
        }
    }
}
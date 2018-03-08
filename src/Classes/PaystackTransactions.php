<?php
/**
 * Created by PhpStorm.
 * User: Adesubomi
 * Date: 2/20/18
 * Time: 1:19 AM
 */

namespace Adesubomi\Larastack\Classes;


trait PaystackTransactions
{

    public function verifyTransaction(string $refCode)
    {
        try {

            $transactionRef = substr($refCode, 1);
            $response = $this->client->request('GET', $this->url->verifyTransaction($refCode), [
                'headers' => $this->authorization
            ]);

            return $response->getBody();

        }
        catch (\Exception $exception) {

            return $exception->getMessage();
        }
    }
}
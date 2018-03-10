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

    public function verifyTransaction(string $reference)
    {
        try {

            $response = $this->client->request('GET', "https://api.paystack.co/transaction/verify/". $reference, [
                'headers' => $this->authorization
            ]);

            return $response->getBody();

        }
        catch (\Exception $exception) {

            return $exception->getMessage();
        }
    }
}
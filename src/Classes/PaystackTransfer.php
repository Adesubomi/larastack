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

            $response = $this->client->request('GET', $this->url->checkBalance(), [
                'headers' => $this->authorization
            ]);

            return $response->getBody();

        }
        catch (\Exception $exception) {

            return $exception->getMessage();
        }
    }

    public function listTransfers()
    {
        try {

            $response = $this->client->request('GET', $this->url->listTransfers(), [
                'headers' => $this->authorization
            ]);

            return $response->getBody();

        }
        catch (\Exception $exception) {

            return $exception->getMessage();
        }
    }
}
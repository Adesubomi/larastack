<?php
/**
 * Created by PhpStorm.
 * User: Adesubomi
 * Date: 2/20/18
 * Time: 1:19 AM
 */

namespace Adesubomi\Larastack\Classes;


use Adesubomi\Larastack\Exception\LarastackException;
use Adesubomi\Larastack\Exception\LarastackTransportException;

trait PaystackCustomers
{

    /**
     * Lists your paystack customers
     * @return mixed
     * @throws LarastackException
     */
    public function listCustomers()
    {
        try {

            $response = $this->client->request('GET', "https://api.paystack.co/customer", [
                'headers' => $this->authorization
            ]);

            $responseBody = $response->getBody();

            $this->testResponseBody($responseBody);
                return json_decode($responseBody, true)['data'];

        }
        catch (\Exception $exception) {

            throw (new LarastackTransportException($exception->getMessage()));
        }
    }
}
<?php
/**
 * Created by PhpStorm.
 * User: Adesubomi
 * Date: 2/20/18
 * Time: 1:19 AM
 */
namespace Adesubomi\Larastack\Traits;

use Adesubomi\Larastack\Exception\LarastackException;
use Adesubomi\Larastack\Exception\LarastackTransportException;
use Adesubomi\Larastack\Classes\PaystackApi;

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

            $endpoint = PaystackApi::url('customer');
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
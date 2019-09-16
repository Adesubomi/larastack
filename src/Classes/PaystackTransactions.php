<?php
/**
 * Created by PhpStorm.
 * User: Adesubomi
 * Date: 2/20/18
 * Time: 1:19 AM
 */

namespace Adesubomi\Larastack\Classes;


use Adesubomi\Larastack\Exception\LarastackTransportException;
use Illuminate\Support\Facades\Route;

trait PaystackTransactions
{

    /**
     * Verifies a Paystack transaction by reference
     * @param string $reference
     * @return string
     * @throws LarastackTransportException
     */
    public function verifyTransaction(string $reference)
    {
        try {

            $url = "https://api.paystack.co/transaction/verify/". $reference;
            $response = $this->client->request('GET', $url, [
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
     * Initialize a Paystack payment transaction
     * does not redirect on successful response
     * @param string $email
     * @param integer $amount in kobo
     * @param array $meta
     * @param null $callback_url
     * @return mixed
     * @throws LarastackTransportException
     */
    public function initializeTransaction($email, $amount, array $meta = [], $callback_url = null)
    {

        try {

            $url = 'https://api.paystack.co/transaction/initialize';

            $data = array_merge($meta, [
                'email' => $email,
                'amount' => $amount
            ]);

            $this->resolveCallbackUrl($callback_url, $data);

            $response = $this->client->request('POST', $url, [
                'json' => $data,
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
     * Returns callbackUrl based on Larastack preference
     * preference
     * init_param ---> config ---> dashboard_default
     * @param $parameterUrl
     * @param $data
     */
    private function resolveCallbackUrl($parameterUrl='', &$data)
    {

        $configRouteName = config('larastack.callback_route_name');
        $configUrl = (!empty($configRouteName) && Route::has($configRouteName))
            ? route($configRouteName)
            : '';

        if (!empty($parameterUrl)) {

            $data['callback_url'] = $parameterUrl;
        }
        elseif (!empty($configUrl)) {

            $data['callback_url'] = $parameterUrl;
        }
    }
}
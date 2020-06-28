<?php
/**
 * Created by PhpStorm.
 * User: Adesubomi
 * Date: 2/20/18
 * Time: 1:19 AM
 */

namespace Adesubomi\Larastack\Traits;


use Adesubomi\Larastack\Classes\PaystackApi;
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

            $endpoint = PaystackApi::url("transaction/verify/". $reference);
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

    /**
     * Initialize a Paystack payment transaction
     * does not redirect on successful response
     * @param string $email
     * @param integer $amount in kobo
     * @param string $callback_route_name
     * @param array $meta
     * @return mixed
     * @throws LarastackTransportException
     */
    public function initializeTransaction($email, $amount, $callback_route_name = '', array $meta = [])
    {

        try {

            $endpoint = PaystackApi::url("transaction/initialize");
            $data = array_merge($meta, [
                'email' => $email,
                'amount' => $amount
            ]);

            $_callback_url = $this->resolveCallbackUrl($callback_route_name, $data);
            $data['callback_url'] = $_callback_url;

            $response = $this->client->post($endpoint, [
                'json' => $data,
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
     * Returns callbackUrl based on Larastack precedence
     * precedence is as follows
     * custom route_name ---> meta[callback_url] ---> larastack config route_name ---> dashboard_default
     * @param string $callback_route_name_custom
     * @param $data
     * @return string
     */
    private function resolveCallbackUrl($callback_route_name_custom='', $data): string
    {

        $callback_route_name_from_config = config('larastack.callback_route_name');
        $callback_url = '';

        if (!empty($callback_route_name_custom) && Route::has($callback_route_name_custom)) {
            $callback_url = Route::has($callback_route_name_custom);
        }
        else if (!empty($data['callback_url'])) {
            $callback_url = $data['callback_url'];
        }
        else if (!empty($callback_route_name_from_config) && Route::has($callback_route_name_from_config)) {
            $callback_url = Route::has($callback_route_name_from_config);
        }

        return $callback_url;
    }
}
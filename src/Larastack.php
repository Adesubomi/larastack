<?php
/**
 * Created by PhpStorm.
 * User: Adesubomi
 * Date: 2/20/18
 * Time: 12:11 AM
 */

namespace Adesubomi\Larastack;


use Adesubomi\Larastack\Exception\LarastackPaystackException;
use Adesubomi\Larastack\Traits\PaystackCustomers;
use Adesubomi\Larastack\Traits\PaystackInvoices;
use Adesubomi\Larastack\Traits\PaystackPaymentPages;
use Adesubomi\Larastack\Traits\PaystackPlans;
use Adesubomi\Larastack\Traits\PaystackSubscriptions;
use Adesubomi\Larastack\Traits\PaystackSubaccounts;
use Adesubomi\Larastack\Traits\PaystackTransfer;
use Adesubomi\Larastack\Traits\PaystackBulk;
use Adesubomi\Larastack\Traits\PaystackMiscellaneous;
use Adesubomi\Larastack\Traits\PaystackSettlements;
use Adesubomi\Larastack\Traits\PaystackTransactions;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;

class Larastack
{
    use PaystackCustomers;
    use PaystackTransactions;
    use PaystackSubaccounts;
    use PaystackPlans;
    use PaystackSubscriptions;
    use PaystackPaymentPages;
    use PaystackInvoices;
    use PaystackSettlements;
    use PaystackMiscellaneous;
    use PaystackTransfer;
    use PaystackBulk;

    protected $client;
    protected $headers;
    protected $config;

    public function __construct()
    {
        $this->client = new Client();

        $this->headers = [
            'Authorization' => 'Bearer '. config('larastack.secret_key'),
            'Content-type' => 'application/json',
        ];
    }

    /**
     * Test to see if Paystack has not returned any errors
     * @param array $body
     * @return
     * @throws LarastackPaystackException
     */
    private function testResponseBody(array $body)
    {

        if ( empty($body) ) {
             throw (new LarastackPaystackException());
        }

        if ( empty($body['status']) || empty($body['status']) || empty($body['data'])) {
             throw (new LarastackPaystackException());
        }

        return $body['data'];
    }
}
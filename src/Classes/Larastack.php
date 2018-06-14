<?php
/**
 * Created by PhpStorm.
 * User: Adesubomi
 * Date: 2/20/18
 * Time: 12:11 AM
 */

namespace Adesubomi\Larastack\Classes;


use Adesubomi\Larastack\Exception\LarastackPaystackException;
use GuzzleHttp\Client;

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
    protected $authorization;
    private $url;

    public function __construct()
    {
        $this->client = new Client();
        $this->authorization = [
            'Authorization' => 'Bearer '. config('larastack.secret_key'),
        ];
    }

    /**
     * Test to see if Paystack has not returned any errors
     * @param $body
     * @return
     * @throws LarastackPaystackException
     */
    private function testResponseBody($body)
    {

        if ( empty($body) ) {

             throw (new LarastackPaystackException());
        }

        $bodyArray = json_decode($body, true);

        if ( empty($bodyArray['status']) || !$bodyArray['status'] || empty($bodyArray['data'])) {

             throw (new LarastackPaystackException());
        }

        return $bodyArray['data'];
    }
}
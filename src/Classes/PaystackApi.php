<?php
/**
 * Created by PhpStorm.
 * User: Adesubomi
 * Date: 2/20/18
 * Time: 12:11 AM
 */

namespace Adesubomi\Larastack\Classes;


use GuzzleHttp\Client;

class PaystackApi
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

    public function __construct()
    {
        $this->client = new Client();
        $this->authorization = [
            'Authorization' => 'Bearer '. config('larastack.secret_key'),
        ];
    }
}
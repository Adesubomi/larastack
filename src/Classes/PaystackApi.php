<?php
/**
 * Created by PhpStorm.
 * User: Adesubomi
 * Date: 2/20/18
 * Time: 12:11 AM
 */

namespace Adesubomi\Larastack\Classes;


use GuzzleHttp\Client;

class PaystackUrls
{

    public function listCustomers() { return "https://api.paystack.co/customer"; }

    public function listBanks() { return "https://api.paystack.co/bank"; }

    public function resolveBvn(string $bvn) { return "https://api.paystack.co/bank/resolve_bvn/". $bvn; }

    public function checkBalance() { return "https://api.paystack.co/balance"; }

    public function listTransfers() { return "https://api.paystack.co/transfer"; }
}

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
    private $url;

    public function __construct()
    {
        $this->client = new Client();
        $this->authorization = [
            'Authorization' => 'Bearer '. config('larastack.secret_key'),
        ];

        $this->url = new PaystackUrls();
    }
}
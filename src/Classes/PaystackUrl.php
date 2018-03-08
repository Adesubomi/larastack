<?php
/**
 * Created by PhpStorm.
 * User: spark
 * Date: 3/8/18
 * Time: 4:54 AM
 */

namespace Adesubomi\Larastack\Classes;


class PaystackUrl
{

    public function listCustomers()
    {
        return "https://api.paystack.co/customer";
    }

    public function listBanks()
    {
        return "https://api.paystack.co/bank";
    }

    public function resolveBvn(string $bvn)
    {
        return "https://api.paystack.co/bank/resolve_bvn/". $bvn;
    }
}
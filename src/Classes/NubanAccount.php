<?php
/**
 * Created by PhpStorm.
 * User: Adesubomi
 * Date: 2/20/18
 * Time: 1:38 AM
 */

namespace Adesubomi\Larastack\Classes;


class NubanAccount extends PaystackApi
{

    public $accountNumber, $accountName, $bankCode;

    /**
     * NubanAccount constructor.
     * @param $accountNumber
     * @param $accountName
     * @param $bankCode
     */
    public function __construct($accountNumber, $accountName, $bankCode)
    {
        $this->accountNumber = $accountNumber;
        $this->accountName = $accountName;
        $this->bankCode = $bankCode;

        return $this;
    }

    public function resolve()
    {
        return $this->resolveAccountNumber(
            $this->accountNumber, $this->bankCode
        );
    }
}
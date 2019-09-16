# Larastack
A Simple and Efficient Wrapper Around [Paystack](https://paystack.com) API for Laravel.
[Paystack api documentation](https://developers.paystack.co/docs) can be found [here](https://developers.paystack.co/reference)

## Requirements
- guzzlehttp/guzzle: ^6.3

## Installation
```composer require adesubomi/larastack```

## Usage
Unlike what you may be used to, Larastack simplifies the Paystack Api
and puts all calls inside a single container with descriptive and self
explanatory naming. The naming comes as you think it.

<strong>List Customers</strong><br />
`$larastack->listCustomers();`

<strong>Resolve Account Number</strong><br />
`$larastack->resolveAccountNumber(string $accountNumber, string $bankCode)`

<strong>Resolve BVN</strong><br />
`$larastack->resolveBvn(string $bvn);`

<strong>List Banks</strong><br />
`$larastack->listBanks();`

<strong>Verify or resolve account number</strong><br />
`$larastack->resolveAccountNumber(string $accountNumber, string $bankCode);`

<strong>Verify or resolve BVN</strong><br />
`$larastack->resolveBvn(string $bvn);`

<strong>Initialize a transaction</strong><br />
`$larastack->initializeTransaction(string $email, int $amount, [array $meta], [string $callback_url])`

<strong>Verify a transaction</strong><br />
`$larastack->verifyTransaction(string $reference);`

<strong>List of Transfers</strong><br />
`$larastack->listTransfers();`

<strong>Fetch a Transfer</strong><br />
`$larastack->fetchTransfer(string $transfer_code)`

<strong>Check Balance</strong><br />
`$larastack->checkBalance();` <br />
alias - `$larastack->getBalance();`



## TODOs
- Implement everything in [paystack api reference](https://developers.paystack.co/reference)
- Intensive Testing
- Documentation

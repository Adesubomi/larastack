# Larastack
A Simple and Efficient Wrapper Around [Paystack](https://paystack.com) API for Laravel.

## Requirements
- guzzlehttp/guzzle: ^6.3

## Installation
```composer install adesubomi/larastack```

## Usage
Unlike what you may be used to, Larastack simplifies the Paystack Api
and puts all calls inside a single container with descriptive and self
explanatory naming. The naming comes as you think it.

<strong>Check Balance</strong><br />
`$larastack->checkBalance();`

<strong>Verify or resolve account number</strong><br />
`$larastack->resolveAccountNumber();`

<strong>Verify or resolve BVN</strong><br />
`$larastack->resolveBvn();`

<strong>Verify a transaction</strong><br />
`$larastack->verifyTransaction(string $reference);`



## TODOs
- Install Larastack using composer, (i.e. put Larastack on Packagist)
- Implement everything in [paystack api reference](https://developers.paystack.co/reference)
- Intensive Testing
- Documentation

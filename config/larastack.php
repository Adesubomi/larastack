<?php

return [
    'public_key' => getenv('PAYSTACK_PUBLIC_KEY'),
    'secret_key' => getenv('PAYSTACK_SECRET_KEY'),
    'payment_url' => getenv('PAYSTACK_PAYMENT_URL'),
    'callback_route_name' => '',
    'merchant_email' => getenv('MERCHANT_EMAIL'),
];
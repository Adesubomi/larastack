<?php

return [
    'public_key' => env('PAYSTACK_PUBLIC_KEY', ''),
    'secret_key' => env('PAYSTACK_SECRET_KEY', ''),
    'payment_url' => env('PAYSTACK_PAYMENT_URL', ''),
    'callback_route_name' => '',
    'merchant_email' => env('MERCHANT_EMAIL', ''),
];
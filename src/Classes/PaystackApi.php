<?php

namespace Adesubomi\Larastack\Classes;

class PaystackApi {

    const BASE_URL = "https://api.paystack.co";

    public static function url(string $path, array $query=[]): string
    {
        // SANITIZE THE PATH
        $_path = self::sanitizePath($path);

        // COMPOSE THE QUERY
        $_query = self::composeQueryString($query);

        // CONCATENATE AND RETURN
        return self::BASE_URL .'/'. $_path . $_query;
    }

    private static function sanitizePath($path)
    {
        // remove multiple slashes with single forward slash
        $_path = preg_replace('/(\/+)/','/', $path);

        // default trim
        $_path = trim($_path);

        // remove forward slash from the ends
        $_path = trim($_path, '/');

        // remove back slash from the ends
        $_path = trim($_path, '\\');

        return $_path;
    }

    private static function composeQueryString(array $query): string
    {
        $_queries_array = [];
        foreach ($query as $key => $val) {
            array_push($_queries_array, $key.'='.$val);
        }

        $_query = implode('&', $_queries_array);
        $_query = !empty($_query) && strlen($_query) > 0
            ? '?'.$_query
            : '';

        return urlencode($_query);
    }
}
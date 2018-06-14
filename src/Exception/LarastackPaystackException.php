<?php
/**
 * Created by PhpStorm.
 * User: spark
 * Date: 6/13/18
 * Time: 4:17 AM
 */

namespace Adesubomi\Larastack\Exception;


class LarastackPaystackException extends LarastackException
{

    public function __construct(string $message = "", array $errors = [])
    {
        parent::__construct($message, $errors);
        $this->errors = $errors;
    }
}
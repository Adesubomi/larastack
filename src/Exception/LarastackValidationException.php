<?php
/**
 * Created by PhpStorm.
 * User: spark
 * Date: 6/13/18
 * Time: 3:45 AM
 */

namespace Adesubomi\Larastack\Exception;


use Throwable;

class LarastackValidationException extends LarastackException
{

    public function __construct(string $message = "", array $errors = [])
    {
        parent::__construct($message, $errors);
        $this->errors = $errors;
    }
}
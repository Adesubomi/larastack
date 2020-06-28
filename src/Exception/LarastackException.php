<?php
/**
 * Created by PhpStorm.
 * User: spark
 * Date: 6/13/18
 * Time: 3:43 AM
 */

namespace Adesubomi\Larastack\Exception;

class LarastackException extends \Exception
{
    public $errors;

    public function __construct(string $message = "", $errors=[])
    {
        parent::__construct($message);
        $this->errors = $errors;
    }
}
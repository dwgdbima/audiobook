<?php

namespace App\Exceptions\Repository;

use Exception;
use Throwable;

class InvalidModelClassException extends Exception
{
    public function __construct($message = "Invalid model class", $code = 400, Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}
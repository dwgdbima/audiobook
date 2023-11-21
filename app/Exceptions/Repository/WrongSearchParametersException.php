<?php

namespace App\Exceptions\Repository;

use Exception;
use Throwable;

class WrongSearchParametersException extends Exception
{
    /**
     * WrongSearchParametersException constructor.
     * @param string $message
     * @param int $code
     * @param Throwable|null $previous
     */
    public function __construct($message = "Search params should contain at least attribute and value", $code = 400, Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}
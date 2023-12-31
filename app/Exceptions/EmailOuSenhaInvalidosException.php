<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Http\Response;

class EmailOuSenhaInvalidosException extends Exception
{
    public function __construct(
        string $message = 'Email ou senha inválidos.',
        int $code = Response::HTTP_NOT_FOUND,
        $previous = null,
    )
    {
        parent::__construct($message, $code, $previous);
    }
}

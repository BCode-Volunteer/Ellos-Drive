<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Http\Response;

class UsuarioCadastradoException extends Exception
{
    public function __construct(
        string $message = 'O usuario já está cadastrado!',
        int $code = Response::HTTP_CONFLICT,
        $previous = null,
    )
    {
        parent::__construct($message, $code, $previous);
    }
}

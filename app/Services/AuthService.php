<?php

namespace App\Services;

use App\Exceptions\EmailOuSenhaInvalidosException;

class AuthService implements IAuthService
{
    public function login(array $credentials): string
    {
        if ($token = auth()->attempt($credentials)) {
            return $token;
        }

        throw new EmailOuSenhaInvalidosException;
    }
}

?>
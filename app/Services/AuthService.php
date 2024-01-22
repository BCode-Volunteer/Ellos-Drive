<?php

namespace App\Services;

use App\Exceptions\EmailOuSenhaInvalidosException;
use App\Exceptions\UsuarioCadastradoException;
use App\Models\User;
use Exception;

class AuthService implements IAuthService
{
    public function login(array $credentials): string
    {
        if ($token = auth()->attempt($credentials)) {
            return $token;
        }

        throw new EmailOuSenhaInvalidosException;
    }
    public function register(array $credentials, string $role): bool 
    {
        $canRegisterClient = User::where('email', $credentials['email'])->first() == null;
        if(!$canRegisterClient) {
            throw new UsuarioCadastradoException();
        }

        $user = User::create([
            'name' => $credentials['name'],
            'email' => $credentials['email'],
            'password' => bcrypt($credentials['password']),
            'role' => $role
        ]);
        return true;
    } 
}
?>
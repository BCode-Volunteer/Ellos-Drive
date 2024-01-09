<?php

namespace App\Services;

interface IAuthService
{
    public function login(array $credentials): string;
    public function register(array $credentials, string $role): bool;
}

?>
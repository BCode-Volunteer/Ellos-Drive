<?php

namespace App\Providers;

use App\Services\AuthService;
use App\Services\IAuthService;
use App\Services\IProdutoService;
use App\Services\ProdutoService;
use Illuminate\Support\ServiceProvider;

class ServiceServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $services = [
            [
                'interface' => IAuthService::class,
                'implementation' => AuthService::class,
            ]
        ];

        foreach ($services as $service) {
            $this->app->bind($service['interface'], $service['implementation']);
        }
    }
}

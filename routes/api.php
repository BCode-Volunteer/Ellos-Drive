<?php

use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\ProdutoController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'auth'], function () {
    Route::controller(AuthController::class)->group(function () {
        Route::post('/login', 'login');
    });
});

Route::group(['prefix' => 'me', 'middleware' => 'jwt.verify'], function () {
    Route::controller(AuthController::class)->group(function () {
        Route::get('/', 'index');
    });
});


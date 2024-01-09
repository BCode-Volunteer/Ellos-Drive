<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\APP\LoginController;
use Illuminate\Support\Facades\Route;

Route::get('/login', function () {
    return view('login-page');
});

Route::controller(AuthController::class)->group(function () {
    Route::post('/login', 'login');
});

Route::group(['prefix' => '/register', 'middleware' => 'jwt.verify'], function () {
    Route::controller();
});

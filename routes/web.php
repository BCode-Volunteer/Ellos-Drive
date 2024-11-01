<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DriveController;
use Illuminate\Support\Facades\Route;

Route::get("/", function () {
    return redirect("/drive");
});

Route::get('/login', function () {
    return view('auth.login-page');
});

Route::controller(AuthController::class)->group(function () {
    Route::post('/login', 'login');
});

Route::group(['prefix' => '/admin', 'middleware' => 'jwt.verify'], function () {
    Route::controller(AdminController::class)->group(function () {
        Route::get("/registerClient", 'registerClientView')->name('admin.register.view');
        Route::post("/registerClient", 'registerClient'); 
    });
});

Route::group(['prefix'=> '/drive', 'middleware'=> 'jwt.verify'], function () {
    Route::controller(DriveController::class)->group(function () {
        Route::get("/", "index");
    });
});
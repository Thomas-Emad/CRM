<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;

Route::group(['middleware' => 'guest', 'controller' => AuthController::class], function () {
    Route::get('/register', 'showRegisterForm')->name('register');
    Route::post('/register', 'register')->name('register');
    Route::get('/login', 'showLoginForm')->name('login');
    Route::post('/login', 'login')->name('login');
});


Route::group(['middleware' => 'auth', 'controller' => AuthController::class], function () {
    Route::post('/logout', 'logout')->name('logout');
});

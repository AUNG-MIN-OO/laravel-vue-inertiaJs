<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

Route::inertia('/','Home',['users'=>\App\Models\User::paginate(5)])->name('home');

Route::group(['middleware' => ['auth']], function () {
    Route::inertia('/dashboard','Dashboard')->name('dashboard');
    Route::post('/logout',[AuthController::class, 'logout'])->name('logout');
});

Route::group(['middleware' => ['guest']], function () {
    Route::inertia('/register','Auth/Register')->name('register');
    Route::post('/register',[AuthController::class, 'register']);

    Route::inertia('/login','Auth/Login')->name('login');
    Route::post('/login',[AuthController::class, 'login']);
});




<?php

use Illuminate\Support\Facades\Route;

Route::inertia('/','Home')->name('home');

Route::inertia('/register','Auth/Register')->name('register');

Route::post('/register',[\App\Http\Controllers\AuthController::class, 'register']);

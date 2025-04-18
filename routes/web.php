<?php

use App\Http\Controllers\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\User;

Route::get('/',function (Request $request){
    return inertia('Home',[
        'users'=>User::when($request->search, function($query) use ($request){
            $query->where('name','like','%'.$request->search.'%')
                    ->orWhere('email','like','%'.$request->search.'%');
        })->paginate(5)->withQueryString(),

        'searchKey' => $request->search,

        'can' => [
            'delete_user' => \Illuminate\Support\Facades\Auth::user() ? Auth::user()->can('delete', User::class) : null,
        ]
    ]);
})->name('home');

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




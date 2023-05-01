<?php

use Illuminate\Support\Facades\Route; 

use App\Http\Controllers\AuthController;
use App\Http\Controllers\GuestsController;


Route::controller(AuthController::class)->group(function () {
    Route::post('login', 'login');
    Route::post('register', 'register');
    Route::post('logout', 'logout');
    Route::post('refresh', 'refresh');

});

Route::controller(GuestsController::class)->group(function () {
    Route::get('Guests', 'index');
    Route::post('Guests', 'store');
    Route::get('Guests/{id}', 'show');
    Route::put('Guests/{id}', 'update');
    Route::delete('Guests/{id}','destroy');
});
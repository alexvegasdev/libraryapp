<?php

use App\Http\Controllers\Auth\AuthenticatedController;
use App\Http\Controllers\Auth\RegisteredUserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Auth Routes
|--------------------------------------------------------------------------
|
*/

Route::group([
    'middleware' => 'guest'
], static function () {
    Route::post('login', [AuthenticatedController::class, 'store'])->name('login');
    Route::post('register', [RegisteredUserController::class, 'store'])->name('register');
});

Route::group([
    'middleware' => 'auth:sanctum'
], static function () {
    Route::post('logout', [AuthenticatedController::class, 'destroy'])->name('logout');
});

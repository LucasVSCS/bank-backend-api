<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
 */

// Auth
Route::prefix('auth')->group(function () {
    Route::post('/login', 'AuthController@login')->name('login');
});

Route::middleware('auth:api')->group(function () {

    // Account balance routes
    Route::prefix('account')->group(function () {
        Route::post('/withdraw-balance', 'AccountController@withdrawAccountBalance')->name('withdraw-balance');
        Route::post('/deposit-balance', 'AccountController@depositAccountBalance')->name('deposit-balance');
    });

    // User account routes
    Route::prefix('user')->group(function () {
        Route::post('/user-account', 'UserController@getUserAccountInfo')->name('user-account');
    });

    // Auth
    Route::prefix('auth')->group(function () {
        Route::post('/logout', 'AuthController@logout')->name('logout');
    });
});

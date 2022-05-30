<?php

use App\Http\Controllers\Api\v1\AuthController;
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

Route::group(["prefix" => "v1"], function () {

    // Public routes
    Route::post('register/', [AuthController::class, 'register'])->name('auth.register');
    Route::post('login/', [AuthController::class, 'login'])->name('auth.login');

    // Protected routes
    Route::group(['middleware' => ['auth:sanctum']], function () {

        Route::post('logout/', [AuthController::class, 'logout'])->name('auth.logout');

    });
});

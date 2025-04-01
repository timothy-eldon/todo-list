<?php

use Illuminate\Support\Facades\Route;
use Modules\Auth\App\Http\Controllers\AuthController;

/*
 *--------------------------------------------------------------------------
 * Web Routes
 *--------------------------------------------------------------------------
 *
 * Here is where you can register Web routes for your application. These
 * routes are loaded by the RouteServiceProvider within a group which
 * is assigned the "Web" middleware group. Enjoy building your Web!
 *
*/

Route::middleware('auth')->group(function () {
    Route::resource('auth', AuthController::class)->names('auth');
});

require __DIR__.'/auth.php';

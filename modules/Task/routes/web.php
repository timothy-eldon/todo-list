<?php

use Illuminate\Support\Facades\Route;
use Modules\Task\App\Http\Controllers\TaskController;
use Modules\Task\App\Livewire\Index;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group([], function () {
    Route::resource('task', TaskController::class)->names('task');
});

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('myday', Index::class)->name('myday.index');
});

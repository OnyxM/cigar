<?php

use App\Http\Controllers\AppController;
use App\Http\Controllers\PaypalPaymentController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('', [AppController::class, "index"])->name('index');
Route::get('about', [AppController::class, "about"])->name('about');
Route::get('store', [AppController::class, "store"])->name('store');
Route::get('store/{id}-{slug}', [AppController::class, "store_item"])->name('store.item');

<?php

use App\Http\Controllers\PaypalPaymentController;
use Illuminate\Http\Request;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['prefix'=>'paypal'], function(){
    Route::post('/order/create',[PaypalPaymentController::class,'create'])->name('paypal.create_order');
    Route::post('/order/capture/',[PaypalPaymentController::class,'capture'])->name('paypal.capture_order');
});

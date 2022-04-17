<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PaymentPageController;
use App\Http\Controllers\SppPaymentController;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/payment', [PaymentPageController::class, 'index'])->name('payment');
Route::get('/payment/{programs_id}', [PaymentPageController::class, 'levels'])->name('payment');

Route::post('payment/spp/create/{id}', [SppPaymentController::class, 'createPayment'])->name('create.order.spp');
Route::post('payment/spp/capture/{id}', [SppPaymentController::class, 'capturePayment'])->name('capture.order.spp');

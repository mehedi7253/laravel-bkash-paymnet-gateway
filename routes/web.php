<?php

use App\Http\Controllers\OrderController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PaymentController;
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

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['middleware' => ['auth']], function () {
    Route::resource('orders', OrderController::class);
    Route::post('token', [PaymentController::class, 'token'])->name('token');
    Route::get('createpayment', [PaymentController::class, 'createpayment'])->name('createpayment');
    Route::get('executepayment', [PaymentController::class, 'executepayment'])->name('executepayment');
});

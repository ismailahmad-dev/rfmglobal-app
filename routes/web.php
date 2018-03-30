<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\PaymentController;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::post('/cart/{id}', [CartController::class, 'add'])->name('cart.add');
Route::get('/cart', [CartController::class, 'index'])->name('cart');

Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout');
Route::post('/checkout', [CheckoutController::class, 'store'])->name('checkout.store');

Route::get('/success', fn () => view('pages.success'))->name('success');
Route::get('/success/{order_no}', [CheckoutController::class, 'success'])
    ->name('success');

Route::get('/pay/{order_no}', [PaymentController::class, 'pay'])
    ->name('payment.pay');

Route::get('/payment/callback/{order_no}', [PaymentController::class, 'callback'])
    ->name('payment.callback');

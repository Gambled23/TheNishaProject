<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\UserController;

Route::resource('user', UserController::class)->middleware('auth');

Route::get('/', function () {
    return view('home');
})->name('home');;

Route::get('/tienda', function () {
    $products = Product::all();
    return view('tienda', ['products' => $products]);
})->name('tienda');

Route::get('/checkout', function () {
    return view('checkout');
})->name('checkout');

Route::get('/tests', function () {
    return view('tests');
});

// Google Login
Route::get('/google/redirect', [App\Http\Controllers\GoogleLoginController::class, 'redirectToGoogle'])->name('google.redirect');
Route::get('/google/callback', [App\Http\Controllers\GoogleLoginController::class, 'handleGoogleCallback'])->name('google.callback');

//Middleware login
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/account', function () {
        return view('account');
    })->name('account');
});

//Paypal
Route::controller(PaymentController::class)
    ->prefix('paypal')
    ->group(function () {
        Route::view('payment', 'paypal.index')->name('create.payment');
        Route::get('handle-payment', 'handlePayment')->name('make.payment');
        Route::get('cancel-payment', 'paymentCancel')->name('cancel.payment');
        Route::get('payment-success', 'paymentSuccess')->name('success.payment');
    });
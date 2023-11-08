<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\PaymentController;
use App\Models\Producto;
use App\Models\Categoria;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Controller;

Route::get('/', function () {
    $productos = Producto::take(2)->get();
    return view('home', ['productos' => $productos]);
})->name('home');

Route::resource('user', UserController::class)->middleware('auth');

Route::get('/tienda', function () {
    $productos = Producto::all();
    return view('tienda', ['productos' => $productos]);
})->name('tienda');

Route::resource('producto', ProductoController::class);
Route::resource('categoria', CategoriaController::class);

Route::get('/checkout', function () {
    return view('checkout');
})->name('checkout');

Route::get('/account', function () {
    return view('indexUser');
})->name('account');

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
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

route::get('/redirect', [HomeController::class, 'redirect']);

//Paypal
Route::controller(PaymentController::class)
    ->prefix('paypal')
    ->group(function () {
        Route::view('payment', 'paypal.index')->name('create.payment');
        Route::get('handle-payment', 'handlePayment')->name('make.payment');
        Route::get('cancel-payment', 'paymentCancel')->name('cancel.payment');
        Route::get('payment-success', 'paymentSuccess')->name('success.payment');
    });

Route::any('/search',function(){
    $q = request()->get('q');
    $productos = Producto::where('nombre','LIKE','%'.$q.'%')->get();
    return view('search', ['productos' => $productos]);
});
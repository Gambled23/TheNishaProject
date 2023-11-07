<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\PaymentController;
use App\Models\producto;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductoController;

Route::get('/', function () {
    $productos = producto::take(2)->get();
    return view('home', ['productos' => $productos]);
})->name('home');;

Route::resource('user', UserController::class)->middleware('auth');

Route::get('/tienda', function () {
    $productos = producto::all();
    return view('tienda', ['productos' => $productos]);
})->name('tienda');

Route::resource('producto', ProductoController::class);

Route::get('/checkout', function () {
    return view('checkout');
})->name('checkout');

Route::get('/tests', function () {
    $제품 = producto::all();
    return view('tests', ['제품' => $제품]);
});

Route::post('/upload', function (Request $request) {
    if ($request->hasFile('image')) {
        foreach ($request->file('image') as $file) {
            $productId = $request->input('product');
            $producto = Producto::find($productId);
            $imageName = $producto->nombre.$producto->imagenesTotales.'.' . $file->extension();
            $file->move(public_path('assets'), $imageName);
            $producto->imagenesTotales = $producto->imagenesTotales + 1;
            $producto->save();
        }
    }
})->name('upload');

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
        return view('indexUser');
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

Route::any('/search',function(){
    $q = request()->get('q');
    $productos = Producto::where('nombre','LIKE','%'.$q.'%')->get();
    return view('search', ['productos' => $productos]);
});
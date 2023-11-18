<?php

use App\Models\Pedidos;
use App\Models\Producto;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\TagController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DomPdfController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ProductoController;


Route::get('/redirect', [HomeController::class, 'redirect']);

Route::get('/', function () {
    #$productos = Producto::take(2)->get();
return view('home', /*['productos' => $productos]*/);
})->name('home');

Route::group(['middleware' => 'auth'], function() {
    Route::group([
        'prefix' => 'admin',
        'middleware' => 'usertype', 
        'as' =>'admin.',
     ], function() {
            //reminder de que debi diseñar mwjor esto
     });

    Route::group([
        'prefix' => 'user',
        'as' =>'user.',
    ],  function() {

        Route::get('/account', function () {
            $pedidos = Pedidos::where('user_id', Auth::id())
            ->where('pagado', 1)
            ->get();
            return view('indexUser', ['pedidos' => $pedidos]);
            })->name('account');
        });

        //Paypal
        Route::controller(PaymentController::class)
        ->prefix('paypal')
        ->group(function () {
            Route::view('payment', 'paypal.index')->name('create.payment');
            Route::post('handle-payment', 'handlePayment')->name('make.payment');
            Route::get('cancel-payment', 'paymentCancel')->name('cancel.payment');
            Route::get('payment-success', 'paymentSuccess')->name('success.payment');

        //Carrito
        Route::get('cart', [CartController::class, 'cartList'])->name('cart.list');
        Route::post('cart', [CartController::class, 'addToCart'])->name('cart.store');
        Route::post('update-cart', [CartController::class, 'updateCart'])->name('cart.update');
        Route::post('remove', [CartController::class, 'removeCart'])->name('cart.remove');
        Route::post('clear', [CartController::class, 'clearAllCart'])->name('cart.clear');

        Route::post('/compra', function (Request $request) {
            $data = $request->all();
            return view('confirmar_compra', ['data' => $data]);
        })->name('entrega');
        });
 });



//RUTAS CON ACCESO EN GENERAL

Route::get('/tienda', function () {
    $productos = Producto::all();
    return view('tienda', ['productos' => $productos]);
})->name('tienda');

Route::get('/tests', function () {
    $제품 = producto::all();
    return view('tests', ['제품' => $제품]);
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
    
Route::any('/search',function(){
    $q = request()->get('q');
    $productos = Producto::where('nombre','LIKE','%'.$q.'%')->get();
    return view('search', ['productos' => $productos]);
});

Route::post('/pdf', [DomPdfController::class, 'getPdf'])->name('pdf');

Route::resource('user', UserController::class)->middleware('auth');
Route::resource('producto', ProductoController::class);
Route::resource('tag', TagController::class);
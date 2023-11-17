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
use App\Http\Controllers\CategoriaController;

Route::get('/', function () {
    $productos = Producto::take(2)->get();
    return view('home', ['productos' => $productos]);
})->name('home');

Route::resource('user', UserController::class)->middleware('auth');

Route::get('/tienda', function () {
    $productos = Producto::all();
    return view('tienda', ['productos' => $productos]);
})->name('tienda');

#Route::resource('producto', ProductoController::class);
Route::get('/producto', [ProductoController::class, 'index'])->name('producto.index');
Route::get('/producto/create', [ProductoController::class, 'create'])->name('producto.create');
Route::get('producto/{producto}/edit', [ProductoController::class, 'edit'])->name('producto.edit');
Route::put('producto/{producto}', [ProductoController::class, 'update'])->name('producto.update');
Route::delete('producto/{producto}', [ProductoController::class, 'destroy'])->name('producto.destroy');
Route::get('/producto/{producto}', [ProductoController::class, 'show'])->name('producto.show');

Route::post('/producto', [ProductoController::class, 'store'])->name('producto.store');

Route::resource('tag', TagController::class);

Route::get('/account', function () {
    $pedidos = Pedidos::where('user_id', Auth::id())
                      ->where('pagado', 1)
                      ->get();
    return view('indexUser', ['pedidos' => $pedidos]);
})->name('account');

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

route::get('/redirect', [HomeController::class, 'redirect']);

//Paypal
Route::controller(PaymentController::class)
    ->prefix('paypal')
    ->group(function () {
        Route::view('payment', 'paypal.index')->name('create.payment');
        Route::post('handle-payment', 'handlePayment')->name('make.payment');
        Route::get('cancel-payment', 'paymentCancel')->name('cancel.payment');
        Route::get('payment-success', 'paymentSuccess')->name('success.payment');
    });
    
Route::any('/search',function(){
    $q = request()->get('q');
    $productos = Producto::where('nombre','LIKE','%'.$q.'%')->get();
    return view('search', ['productos' => $productos]);
});

//Carrito
Route::get('cart', [CartController::class, 'cartList'])->name('cart.list')->middleware('auth');
Route::post('cart', [CartController::class, 'addToCart'])->name('cart.store')->middleware('auth');
Route::post('update-cart', [CartController::class, 'updateCart'])->name('cart.update')->middleware('auth');
Route::post('remove', [CartController::class, 'removeCart'])->name('cart.remove')->middleware('auth');
Route::post('clear', [CartController::class, 'clearAllCart'])->name('cart.clear')->middleware('auth');

Route::post('/compra', function (Request $request) {
    $data = $request->all();
    return view('confirmar_compra', ['data' => $data]);
})->name('entrega');

Route::post('/pdf', [DomPdfController::class, 'getPdf'])->name('pdf');
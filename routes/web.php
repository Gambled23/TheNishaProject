<?php

use App\Models\Tag;
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
use App\Http\Controllers\VariacionController;
use App\Http\Controllers\productoCategoriaController;

Route::get('/redirect', [HomeController::class, 'redirect']);

Route::get('/', function () {
    #$productos = Producto::take(2)->get();
return view('home', /*['productos' => $productos]*/);
})->name('home');


//GRUPO DE RUTAS CON MIDDLEWARE
Route::group(['middleware' => 'auth'], function() {

    Route::group([
        'prefix' => 'admin',
        'middleware' => 'usertype', 
        'as' =>'admin.',
     ], function() {
            //PRODUCTO
            Route::get('producto/create', [ProductoController::class, 'create'])->name('producto.create');
            Route::get('/producto', [ProductoController::class, 'index'])->name('producto.index');
            Route::get('producto/{producto}/edit', [ProductoController::class, 'edit'])->name('producto.edit');
            Route::put('producto/{producto}', [ProductoController::class, 'update'])->name('producto.update');
            Route::delete('producto/{producto}', [ProductoController::class, 'destroy'])->name('producto.destroy');
            Route::post('/producto', [ProductoController::class, 'store'])->name('producto.store'); 
            
            //VARIACION
            Route::resource('variacion', VariacionController::class);

            //TAGS
            Route::resource('tag', TagController::class);

            //ARCHIVE (FORCE AND RESTORE)
            Route::get('/archive', [UserController::class, 'archive']);

     });

    Route::group([
        'prefix' => 'user',
        'as' =>'user.',
    ],  function() {

            Route::get('/account', function () {
                $pedidos = Pedidos::where('user_id', Auth::id())
                                ->where('pagado', 1)
                                ->get();
                return view('User/indexUser', ['pedidos' => $pedidos]);
            })->name('account');

            //Paypal
            Route::controller(PaymentController::class)
            ->prefix('paypal')
            ->group(function () {
                Route::view('payment', 'paypal.index')->name('create.payment');
                Route::post('handle-payment', 'handlePayment')->name('make.payment');
                Route::get('cancel-payment', 'paymentCancel')->name('cancel.payment');
                Route::get('payment-success', 'paymentSuccess')->name('success.payment');
            });

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

        Route::resource('user', UserController::class);
        Route::delete('/user/{user}', [UserController::class, 'destroy'])->withTrashed();
        Route::post('/user/{user}/restore', [UserController::class, 'restore'])->withTrashed();
 });



//RUTAS CON ACCESO EN GENERAL

Route::get('/tienda', function () {
    $categorias = Tag::all();
    $productos = Producto::all();
    return view('tienda', ['productos' => $productos, 'categorias' => $categorias]);
})->name('tienda');


Route::get('/productos/categoria/{id}', [productoCategoriaController::class, 'showByCategory'])->name('productos.categoria');

Route::get('/categorias', function () {
    $categorias = Tag::all();
    return view('categorias', ['categorias' => $categorias]);
})->name('categorias');

Route::get('/faq', function () {
    return view('faq');
})->name('faq');

Route::get('/about', function () {
    return view('about');
})->name('about');

Route::get('/producto/{producto}', [ProductoController::class, 'show'])->name('producto.show');

//Route::resource('categoria', CategoriaController::class);

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


<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\DetailController;
use App\Http\Controllers\OpinionController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\LoginController;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\BudgetController;
use App\Http\Controllers\PCConfiguratorController;

Route::get('/admin/dashboard', function () {
    return view('admin.dashboard');
})->middleware(['auth', 'admin'])->name('admin.dashboard'); 

Route::get('/profile', function () {
    return view('profile');
})->middleware(['auth'])->name('profile');

Route::get('/profile/edit', function () {
    return view('edit-profile');
})->middleware(['auth'])->name('userProfile.edit');


// Rutas Home
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/top-rated-products', [HomeController::class, 'getTopRatedProducts'])->name('home.topRated');



// Rutas de Usuarios(Users)
Route::resource('users', UserController::class);

// Rutas de Categorias(Categories)
Route::resource('categories', CategoryController::class);


// Rutas de Pagos(Payments)
Route::resource('payments', PaymentController::class);

// Rutas de Pedidos(Orders)
Route::resource('orders', OrderController::class);
// Ruta para mostrar la lista de órdenes
Route::get('/orders', [OrderController::class, 'index'])->name('orders.index');


// Rutas de Productos(Products)
Route::resource('products', ProductController::class);
Route::get('/product/{slug}', [ProductController::class, 'showToUser'])
    ->name('products.showUser'); // Ruta para mostar productos para usuario(User)

// Rutas de Opiniones(Opinions)
Route::resource('opinions', OpinionController::class);
Route::post('/opinions/{opinion}/toggle-useful', [OpinionController::class, 'toggleUseful'])->name('opinions.toggle-useful');


// Rutas de Detalles(Details)
Route::resource('details', DetailController::class);

// Rutas Login 
Route::get('/login', function () {return view('login');})->name('login'); /////////////////
Route::post('/login', [LoginController::class, 'login'])->name('login');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');



// Rutas de Carrito (Cart)
// Rutas relacionadas con el carrito de compras
Route::middleware(['auth'])->group(function () { 

    Route::get('/cart/count', [CartController::class, 'getCartCount'])->name('cart.count');
    Route::get('/cart', [CartController::class, 'showCart'])->name('cart.show');
    Route::post('/cart/add/{productId}', [CartController::class, 'addToCart'])->name('cart.add');
    Route::delete('/cart/remove/{productId}', [CartController::class, 'removeFromCart'])->name('cart.remove');
    Route::get('/checkout', [CartController::class, 'checkout'])->name('cart.checkout');


    Route::get('/configurator', [PCConfiguratorController::class, 'index'])->name('configurator.index');
    Route::post('/configurador/create', [PCConfiguratorController::class, 'create'])->name('pcconfigurator.create');

    
    // Rutas relacionadas con el pago
    Route::get('/payment/create/{orderId}', [PaymentController::class, 'createPayment'])->name('payment.create');
    Route::get('/payment-status', [PaymentController::class, 'executePayment'])->name('payment.status');
    Route::get('/payment-cancel', [PaymentController::class, 'cancelPayment'])->name('payment.cancel');
});

// routes/web.php



Route::get('search', [SearchController::class, 'search'])->name('search');





















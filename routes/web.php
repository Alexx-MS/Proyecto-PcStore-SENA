<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\DetailController;
use App\Http\Controllers\OpinionController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;


// Route::get('/', function () {return view('welcome');});

// Rutas Home
Route::get('/', [HomeController::class, 'index'])->name('home');
// Route::get('home', function () {return view('home.home');})->name('home');

// Rutas de Usuarios(Users)
Route::resource('users', UserController::class);

// Rutas de Categorias(Categories)
Route::resource('categories', CategoryController::class);
//Route::get('/category/{slug}', [CategoryController::class, 'showCategory'])->name('category');

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

// Rutas de Detalles(Details)
Route::resource('details', DetailController::class);

//route::get('products/{product}/edit',[ProductController::class,'edit'])->name('products.edit');










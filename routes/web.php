<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\OpinionController;
use App\Http\Controllers\DetailController;


Route::get('/', function () {return view('welcome');
});

// Ruta de Home
Route::get('home', function () {return view('home.home');})->name('home');

// Rutas de Usuarios(Users)
Route::resource('users', UserController::class);

// Rutas de Categorias(Categories)
Route::resource('categories', CategoryController::class);
//Route::get('/category/{slug}', [CategoryController::class, 'showCategory'])->name('category');

// Rutas de Pagos(Payments)
Route::resource('payments', PaymentController::class);

// Rutas de Pedidos(Orders)
Route::resource('orders', OrderController::class);

// Rutas de Productos(Products)
Route::resource('products', ProductController::class);

// Rutas de Opiniones(Opinions)
Route::resource('opinions', OpinionController::class);

// Rutas de Detalles(Details)
Route::resource('details', DetailController::class);

// Rutas Ofertas(offers)











<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\OpinionController;


Route::get('/', function () {
    return view('welcome');
});


// Rutas de Usuarios(Users)
Route::resource('users', UserController::class);

// Rutas de Categorias(Categories)
Route::resource('categories', CategoryController::class);

// Rutas de Pagos(Payments)
Route::resource('payments', PaymentController::class);

// Rutas de Pedidos(Orders)
Route::resource('orders', OrderController::class);

// Rutas de Productos(Products)
Route::resource('products', ProductController::class);

// Rutas de Opiniones(Opinions)
Route::resource('opinions', OpinionController::class);

// Rutas de Detalles(Details)










<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PaymentController;


Route::get('/', function () {
    return view('welcome');
});


// Rutas de Usuarios(Users)
Route::resource('users', UserController::class);

// Rutas de Categorias(Categories)
Route::resource('categories', CategoryController::class);

// Rutas de Pagos(Payments)
Route::resource('payments', PaymentController::class);





<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;


// Rutas de Usuarios(Users)
Route::resource('users', UserController::class);




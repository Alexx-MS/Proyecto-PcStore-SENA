<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;


// Rutas de la tabla usuario
Route::resource('users',[UserController::class,]);
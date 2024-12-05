<?php

namespace App\Http\Middleware;


use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        // Verifica si el usuario está autenticado y si su user_type es 'ADMIN'
        if (!Auth::user()->user_type == 'ADMIN') {
            return redirect()->route('home'); // Redirige a la página de inicio si no es admin
        }

        return $next($request);
    }
}



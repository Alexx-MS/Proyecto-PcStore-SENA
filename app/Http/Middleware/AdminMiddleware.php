<?php

namespace App\Http\Middleware;


use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
        public function handle(Request $request, Closure $next)
    {
        if (Auth::user() && Auth::user()->user_type === 'ADMIN') {
            return $next($request);
        }
        
        return redirect()->route('home')->with('error', 'No tienes acceso a esta sección.');
    }

}



<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    // Iniciar sesión
    public function login(Request $request)
    {
        // Validar los datos del formulario
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        $redentials['password'] = Hash::make($credentials['password']);

        // Intentar autenticar al usuario
        if (Auth::attempt($credentials)) {

            // Regenerar la sesión
            $request->session()->regenerate();

            // Redirigir a la página principal 
            return redirect()->intended('/'); 
        }

        // Si falla, regresar con un mensaje de error
        return back()->withErrors([
            'email' => 'Las credenciales no coinciden.',
        ]);
    }

    // Cerrar sesión
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('home');
    }
}


<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('users.index', compact('users'));
    }

    public function create()
    {
        $users = User::all();
        return view('users.create', compact('users'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'full_name' => 'nullable|string|max:255',
            'username' => 'nullable|string|max:255',
            'password' => 'required|string',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|numeric',
            'address' => 'nullable|string|max:255',
            'postal_code' => 'nullable|numeric',
            'birth_date' => 'nullable|date',
            'user_type' => 'required|in:ADMIN,CLIENT',
            'registration_date' => now(),
        ]);

        $validated['password'] = Hash::make($validated['password']);
        

        User::create($validated);
        return redirect()->route('home')->with('success', 'Cuenta creada correctamente.');
    }
    
    public function edit($id)
    {
        $user = User::findOrFail($id);

        if (Auth::user()->user_type === 'ADMIN') {
            // Cargar vista para el administrador
            return view('users.edit', compact('user'));
        } else {
            // Cargar vista para el cliente
            return view('user.edit', compact('user'));
        }
    }
        public function show(User $user)
    {
        return view('users.show', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'full_name' => 'nullable|string|max:255',
            'username' => 'nullable|string|max:255',
            'password' => 'nullable|string',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|numeric',
            'address' => 'nullable|string|max:255',
            'postal_code' => 'nullable|numeric',
            'birth_date' => 'nullable|date',
            'user_type' => 'required|in:ADMIN,CLIENT',
            'registration_date' => now(),
        ]);

        if (!empty($validated['password'])) {
            // Si se envió una nueva contraseña, encriptarla
            $validated['password'] = Hash::make($validated['password']);
        } else {
            // Si no se envió contraseña, quitarla de la actualización
            unset($validated['password']);
        }

        $user = User::findOrFail($id);
        $user->update($validated);

        return redirect()->route(Auth::user()->user_type === 'ADMIN' ? 'users.index' : 'profile')->with('success', 'Datos actualizados exitosamente.');

    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('users.index')->with('success', 'User eliminado correctamente.');
    }
}

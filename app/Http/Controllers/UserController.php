<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

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
            'password' => 'required|string|min:8',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|numeric',
            'address' => 'nullable|string|max:255',
            'postal_code' => 'nullable|numeric',
            'birth_date' => 'nullable|date',
            'user_type' => 'required|in:ADMIN,CLIENT',
            'registration_date' => now(),
        ]);

        User::create($validated);
        return redirect()->route('home')->with('success', 'Cuenta creada correctamente.');
    }
    
    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('users.edit', compact('user'));
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
            'password' => 'required|string|min:8',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|numeric',
            'address' => 'nullable|string|max:255',
            'postal_code' => 'nullable|numeric',
            'birth_date' => 'nullable|date',
            'user_type' => 'required|in:ADMIN,CLIENT',
            'registration_date' => now(),
        ]);

        $user = User::findOrFail($id);
        $user->update($validated);

        return redirect()->route('users.index')->with('success', 'Usuario actualizado exitosamente.');
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('users.index')->with('success', 'User eliminado correctamente.');
    }
}

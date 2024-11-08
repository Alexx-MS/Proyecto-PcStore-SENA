<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Http\Request;


class UserController extends Controller
{
    // Mostrar todos los usuarios
    public function index()
    {
        $users = User::all();
        return view('users.index', compact('users'));
    }

    // Mostrar el formulario para crear un nuevo usuario
    public function create()
    {
        return view('users.create');
    }

    // Guardar un nuevo usuario 
    public function store(Request $request)
    {
        // Validar los datos
        $validated = $request->validate([
            'full_name' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',  
            'email' => 'required|email|max:255|unique:users',  
            'phone' => 'required|numeric',
            'address' => 'required|string|max:255',
            'postal_code' => 'required|numeric',
            'birth_date' => 'required|date',
            'user_type' => 'required|in:ADMIN,CLIENT',
            'history' => 'nullable|string',
            'registration_date' => 'required|date',
        ]);
        
        // Crear el usuario usando mass-assignment
        $user = User::create([
            'full_name' => $validated['full_name'],
            'username' => $validated['username'],
            'password' => bcrypt($validated['password']), 
            'email' => $validated['email'],
            'phone' => $validated['phone'],
            'address' => $validated['address'],
            'postal_code' => $validated['postal_code'],
            'birth_date' => $validated['birth_date'],
            'user_type' => $validated['user_type'],
            'history' => $validated['history'],  
            'registration_date' => $validated['registration_date'],
        ]);
        
         // Redirigir a la pagina de usuarios con un mensaje de exito
         return redirect()->route('users.index')->with('success', 'Usuario creado con éxito');

         /*$user= new User();
        $user->full_name=$request->full_name;
        $user->username=$request->username;
        $user->phone=$request->phone;
        $user->address=$request->address;
        $user->postal_code=$request->postal_code;
        $user->birth_date=$request->birth_date;
        $user->user_type=$request->user_type;
        $user->history=$request->history;
        $user->registration_date=$request->registration_date;
        $user->email=$request->email;

        $user->save();
        return $user;*/
    }

    // Muestra un usuario especifico
    public function show(User $user)
    {
        return view('users.show', compact('user'));
    }

    // Mostrar el formulario para editar un usuario
    public function edit($id)
    {
         $user = User::find($id);

        if (!$user) {
            return redirect()->route('users.index')->with('error', 'Usuario No Encontrado.');
        }

        return view('users.edit', compact('user'));
    }


    // Actualizar un usuario
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'full_name' => 'required|string|max:255',
            'username' => 'required|string|max:255',
            'password' => 'nullable|string|min:8',
            'email' => 'required|email|max:255|',
            'phone' => 'required|numeric',
            'address' => 'required|string|max:255',
            'postal_code' => 'required|numeric',
            'birth_date' => 'required|date',
            'user_type' => 'required|in:ADMIN,CLIENT',
            'history' => 'nullable|string',
            'registration_date' => 'required|date',
        ]);

        $user = User::findOrFail($id);

        if ($request->filled('password')) {
            $validated['password'] = Hash::make($request->password);
        } else {
            unset($validated['password']);
        }

        $user->update($validated);

        return redirect()->route('users.index')->with('success', 'Usuario Actualizado Exitosamente.');
    }

    // Eliminar un usuario
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('users.index')->with('success', 'Usuario Eliminado Exitosamente.');
    }
}
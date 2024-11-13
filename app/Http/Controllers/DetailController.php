<?php

namespace App\Http\Controllers;

use App\Models\Detail;
use Illuminate\Http\Request;

class DetailController extends Controller
{
    // Listar todos los registros
    public function index()
    {
        $details = Detail::all();
        return view('details.index', compact('details'));
    }

    // Mostrar formulario de creación
    public function create()
    {
        return view('details.create');
    }

    // Guardar un nuevo registro
    public function store(Request $request)
    {
        $request->validate([
            'quantity' => 'required|integer',
            'observations' => 'nullable|string'
        ]);

        Detail::create($request->all());
        return redirect()->route('details.index')->with('success', 'Detalle creado correctamente.');
    }

    // Mostrar un registro específico
    public function show(Detail $detail)
    {
        return view('details.show', compact('detail'));
    }

    // Mostrar formulario de edición
    public function edit(Detail $detail)
    {
        return view('details.edit', compact('detail'));
    }

    // Actualizar un registro
    public function update(Request $request, Detail $detail)
    {
        $request->validate([
            'quantity' => 'required|integer',
            'observations' => 'nullable|string'
        ]);

        $detail->update($request->all());
        return redirect()->route('details.index')->with('success', 'Detail actualizado correctamente.');
    }

    // Eliminar un registro
    public function destroy(Detail $detail)
    {
        $detail->delete();
        return redirect()->route('details.index')->with('success', 'Detail eliminado correctamente.');
    }
}

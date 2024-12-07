<?php

namespace App\Http\Controllers;

use App\Models\Opinion;
use Illuminate\Http\Request;
use App\Models\Product;

class OpinionController extends Controller
{
    public function index()
    {
        $opinions = Opinion::all();
        return view('opinions.index', compact('opinions'));
    }

    public function create()
    {
        return view('opinions.create');
    }

        public function store(Request $request, Product $product)
    {
        // Validación de los datos
        $request->validate([
            'rating' => 'nullable|integer|between:1,5', // Calificación opcional, si se incluye debe estar entre 1 y 5
            'comment' => 'nullable|string|max:1000', // Comentario opcional
            'usefulness' => 'nullable|boolean', // Utilidad opcional
        ]);

        // Crear la opinión asociada al producto
        $product->opinions()->create([
            'rating' => $request->rating ?? null, // Si no se llena, se guarda como null
            'comment' => $request->comment ?? null, // Si no se llena, se guarda como null
            'date' => now(), // Fecha automática (se asigna la fecha actual)
            'usefulness' => $request->usefulness ?? false, // Si no se llena, se marca como no útil
            'product_id' => $product->id, // El ID del producto lo obtenemos de la ruta
        ]);

        // Redirigir o devolver una respuesta
        return redirect()->route('products.show', $product)->with('success', 'Opinión agregada');
    }


    public function show(Opinion $opinion)
    {
        return view('opinions.show', compact('opinion'));
    }

    public function edit(Opinion $opinion)
    {
        return view('opinions.edit', compact('opinion'));
    }

    public function update(Request $request, Opinion $opinion)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'rating' => 'required|integer|min:1|max:5',
            'comment' => 'required',
            'date' => 'required|date',
            'usefulness' => 'required|integer|min:0',
        ]);

        $opinion->update($request->all());

        return redirect()->route('opinions.index')->with('success', 'Opinion updated successfully.');
    }

    public function destroy(Opinion $opinion)
    {
        $opinion->delete();
        return redirect()->route('opinions.index')->with('success', 'Opinion deleted successfully.');
    }
}

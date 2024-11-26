<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;


class CategoryController extends Controller
{   
    //  Mostrar todas las categorías
        public function index()
    {
        $categories = Category::all();
        return view('categories.index', compact('categories'));
    }
    
    // Mostrar formulario para crear una nueva categoría
    public function create()
    {
        $categories = Category::all();
        return view('categories.create');
    }
    
    // Guardar una nueva categoría
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:categories,name',
            'description' => 'nullable|string',
        ]);
    
        Category::create($validated);
    
        return redirect()->route('categories.index')->with('success', 'Categoría creada correctamente.');
    }
    
    // Mostrar una categoría específica
    public function show($id)
    {
        $category = Category::with('products')->findOrFail($id); // Carga la categoría con sus productos relacionados
        return view('categories.show', compact('category'));
    }

    // Mostrar formulario para editar una categoría
    public function edit($id)
    {
        $category = Category::findOrFail($id);
        return view('categories.edit', compact('category'));
    }

    //  Actualizar una categoría
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        $category = Category::findOrFail($id);
        $category->update($request->all());

        return redirect()->route('categories.index')->with('success', 'Categoria actualizada correctamente.');
    }

    // Eliminar una categoría
    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();
        return redirect()->route('categories.index')->with('success', 'Categoría eliminada correctamente.');
    }

        public function showCategory($slug)
    {
        $categories = [
            'tarjetas-graficas' => 'Tarjetas Gráficas',
            'procesadores' => 'Procesadores',
            'mouses' => 'Mouses',
            'motherboards' => 'Motherboards',
            'monitores' => 'Monitores',
            'laptops' => 'Laptops',
        ];

        // Validar si la categoría existe
        if (!array_key_exists($slug, $categories)) {
            abort(404, 'Categoría no encontrada');
        }

        // Enviar datos a la vista de la categoría específica
        return view('categories.show', [
            'category' => $categories[$slug],
            'slug' => $slug,
            'categories' => $categories, // enviar las categorías si son necesarias
        ]);
    }

}

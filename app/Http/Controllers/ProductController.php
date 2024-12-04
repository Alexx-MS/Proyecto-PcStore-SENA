<?php

namespace App\Http\Controllers;

use App\Http\Controllers\cloudinary;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();  
        return view('products.index', compact('products'));
    }

    public function create()
    {
        $categories = Category::all(); // Carga todas las categorías
        return view('products.create', compact('categories'));
    }

        public function store(Request $request)
    {
        // Validación de los datos
        $validate = $request->validate([
            'name' => 'required',
            'model' => 'required',
            'price' => 'required|integer',
            'description' => 'required',
            'generation' => 'required',
            'release_date' => 'required|date',
            'availability' => 'required',
            'technical_specifications' => 'required',
            'brand' => 'required',
            'category_id' => 'required|exists:categories,id',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,|max:4000', // Validación de la imagen
        ]);

        // Subir la imagen a Cloudinary si existe
        if ($request->hasFile('image')) {
            $uploadedFileUrl = cloudinary()->upload($request->file('image')->getRealPath())->getSecurePath();
            $validate['image'] = $uploadedFileUrl; // Guardar la URL en el array validado
        }

        // Crear el producto con los datos validados
        Product::create($validate);

        // Redirigir con un mensaje de éxito
        return redirect()->route('products.index')->with('success', 'Producto creado correctamente.');
    }

    public function show($slug)
    {
        $product = Product::where('slug', $slug)->firstOrFail();
        $product->load('opinions');
        return view('products.show', compact('product'));
    }

    public function edit($slug)
    {
        $product = Product::where('slug', $slug)->firstOrFail(); // Carga el producto por el slug
        $categories = Category::all(); // Carga todas las categorías
        return view('products.edit', compact('product', 'categories'));
    }
    

    public function update(Request $request, $slug)
    {
        $validate = $request->validate([
            'name' => 'required',
            'model' => 'required',
            'price' => 'required|integer',
            'description' => 'required',
            'generation' => 'required',
            'release_date' => 'required|date',
            'availability' => 'required',
            'technical_specifications' => 'required',
            'brand' => 'required',
        ]);

        $product = Product::where('slug', $slug)->firstOrFail();
        $product->update($validate);

        return redirect()->route('products.index')->with('success', 'Producto actualizado correctamente.');
    }

    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('products.index')->with('success', 'Producto eliminado exitosamente.');
    }

    public function showToUser($slug) 
    {
        $product = Product::where('slug', $slug)->firstOrFail();
        return view('products.showUser', compact('product'));
    }
}

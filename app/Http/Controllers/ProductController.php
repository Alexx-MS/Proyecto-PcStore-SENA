<?php

namespace App\Http\Controllers;

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
        ]);

        Product::create($validate);

        return redirect()->route('products.index')->with('success', 'Producto creado correctamente.');
    }

    public function show($slug)
    {
        $product = Product::where('slug', $slug)->firstOrFail();
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
}

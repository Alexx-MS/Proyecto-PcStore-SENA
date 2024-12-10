<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class PCConfiguratorController extends Controller
{
    public function index()
    {
        return view('pcconfigurator.index');
    }

    public function create(Request $request)
{
    // Validar el presupuesto ingresado
    $validated = $request->validate([
        'budget' => 'required|numeric|min:1',
    ]);

    $budget = $validated['budget'];

    // Categorías específicas para la configuración
    $allowedCategories = ['Tarjeta gráfica', 'Procesadores', 'Disco SSD', 'Motherboard'];

    // Inicializar variables
    $selectedProducts = [];
    $total = 0;

    // Iterar por cada categoría para encontrar productos
    foreach ($allowedCategories as $categoryName) {
        // Obtener productos de la categoría, ordenados por precio ascendente
        $products = Product::whereHas('category', function ($query) use ($categoryName) {
            $query->where('name', $categoryName);
        })->orderBy('price', 'asc')->get();

        // Verificar si existen productos en la categoría
        if ($products->isEmpty()) {
            continue;  // Si no hay productos en esta categoría, pasamos a la siguiente
        }

        // Buscar el producto más barato que no exceda el presupuesto restante
        foreach ($products as $product) {
            // Si el total más el precio del producto no excede el presupuesto
            if (($total + $product->price) <= $budget) {
                // Seleccionamos el producto de la categoría
                $selectedProducts[] = $product;
                $total += $product->price;  // Actualizamos el total
                break;  // Solo seleccionamos un producto por categoría
            }
        }
    }

    // Si no se seleccionan productos, retornamos con un mensaje de error
    if (count($selectedProducts) == 0) {
        return redirect()->route('configurator.index')
                         ->with('error', 'No se encontraron productos dentro del presupuesto ingresado.');
    }

    // Retornar la vista con los resultados
    return view('pcconfigurator.show', [
        'budget' => $budget,
        'products' => $selectedProducts,
        'total' => $total,
    ]);



}

}
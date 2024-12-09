<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;


class HomeController extends Controller
{
    public function index() 
    {
        // Obtener todas las categorías
        $categories = Category::all();

        // Obtener los productos con el mejor rating promedio
        $topRatedProducts = Product::with('opinions')
            ->withAvg('opinions', 'rating') // Calcular el promedio de ratings
            ->orderByDesc('opinions_avg_rating') // Ordenar por calificación promedio
            ->take(5) // Mostrar 5 productos con mejor rating
            ->get();

        // Pasar ambas variables a la vista
        return view('home.home', compact('categories', 'topRatedProducts'));
    }

}


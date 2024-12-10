<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class SearchController extends Controller
{
    public function search(Request $request)
{
    $query = $request->input('query');

    if ($query) {
        // Buscar productos que coincidan con el término
        $products = Product::where('name', 'LIKE', '%' . $query . '%')->get();

        if ($products->isNotEmpty()) {
            return view('search_results', compact('products', 'query'));
        } else {
            // Obtener productos relacionados (por ejemplo, productos populares o más vendidos)
            $relatedProducts = Product::orderBy('created_at', 'desc')->take(5)->get();

            return view('search_results', compact('query', 'relatedProducts'))
                   ->with('message', "No se encontraron productos para: $query 
                   ㅤㅤㅤESTOS SON NUESTROS PRODUCTOS RELACIONADOS"
                );
        }
    }

    return redirect()->back()->with('message', 'No se ingresó ningún término de búsqueda');
}

    



}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Product extends Model
{

    use HasFactory;
    
    // Permitir la asignación masiva solo en estos campos
    protected $fillable = [
        'name', 'model', 'price', 'description', 'generation', 
        'release_date', 'availability', 'technical_specifications', 'brand', 'category_id'
    ];

    // Relación inversa con detalles
    public function detail () 
    {
        return $this->belongsTo(Detail::class);
    }

    // Relación inversa con opiniones
    public function opinion () 
    {
        return $this->belongsTo(Opinion::class);
    }

    // Relación inversa con categorías
    public function category () 
    {
        return $this->belongsTo(Category::class);
    }
}

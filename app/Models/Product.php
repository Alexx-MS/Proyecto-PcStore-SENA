<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Product extends Model
{

    use HasFactory;
    
    // Permitir la asignación masiva en estos campos
    protected $fillable = [
        'name', 'model', 'price', 'description', 'generation', 
        'release_date', 'availability', 'technical_specifications', 'brand', 'category_id', 'slug'
    ];

    // Evento para generar el slug automáticamente
    protected static function boot()
    {
        parent::boot();

        static::saving(function ($product) {
            if (empty($product->slug)) {
                $slug = Str::slug($product->name);

                $originalSlug = $slug;
                $counter = 1;

                while (Product::where('slug', $slug)->exists()) {
                    $slug = $originalSlug . '-' . $counter;
                    $counter++;
                }

                $product->slug = $slug;
            }
        });
    }

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

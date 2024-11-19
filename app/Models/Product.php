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

    public function detail () 
    {
        return $this->belongsTo(Detail::class);
    }

    public function opinion () 
    {
        return $this->belongsTo(Opinion::class);
    }

    public function category () 
    {
        return $this->belongsTo(Category::class);
    }
}

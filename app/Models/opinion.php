<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Opinion extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id',
        'rating',
        'comment',
        'date',
        'usefulness',
    ];
    
    // Relacion Uno a Muchos
    public function product () 
    {
        return $this->belongsTo(Product::class);
    }
}

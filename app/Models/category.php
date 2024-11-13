<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class category extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description'];
    
    // Relacion Uno a Muchos
    public function product () 
    {
        return $this->hasMany(Product::class);
    }
}

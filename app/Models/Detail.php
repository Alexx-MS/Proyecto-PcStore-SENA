<?php

namespace App\Models;

use Faker\Provider\ar_EG\Payment;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Detail extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_id',
        'quantity',
        'observations',
    ];

    public function order () 
    {
        return $this->belongsTo(Order::class);
    }
    
    // Relacion Uno a Muchos
    public function product () 
    {
        return $this->hasMany(Product::class);
    }

}

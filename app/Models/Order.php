<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'quantity',
        'total_amount',
        'status',
        'date_time',
        'content',
        'address',
        'estimated_delivery_date',
        // 'user_id' // Descomentar si necesitas relación con usuario
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relacion Uno a Muchos
    public function details() 
    {
        return $this->hasMany(Detail::class);
    }

    // Relación con Payment
    public function payment()
    {
        return $this->belongsTo(Payment::class);
    }

}

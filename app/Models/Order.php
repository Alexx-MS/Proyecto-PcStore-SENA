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
}

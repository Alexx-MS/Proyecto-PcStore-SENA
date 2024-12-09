<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;
    
      // Relación uno a uno con Pedidos (Orders)
      public function order()
      {
          return $this->hasOne(Order::class);
      }
}

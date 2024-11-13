<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class payment extends Model
{
    public function detail () 
    {
        return $this->belongsTo(Product::class);
    }
}

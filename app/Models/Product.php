<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
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

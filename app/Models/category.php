<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description', 'slug'];

    // Evento para generar el slug automáticamente
    protected static function boot()
    {
        parent::boot();

        static::saving(function ($category) {
            if (empty($category->slug)) {
                $slug = Str::slug($category->name);

                $originalSlug = $slug;
                $counter = 1;

                while (Category::where('slug', $slug)->exists()) {
                    $slug = $originalSlug . '-' . $counter;
                    $counter++;
                }

                $category->slug = $slug;
            }
        });
    }

    // Relacion Uno a Muchos
    public function products () 
    {
        return $this->hasMany(Product::class);
    }
}
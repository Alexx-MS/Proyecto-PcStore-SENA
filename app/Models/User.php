<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Authenticatable;

class User extends Model
{
    use HasFactory;
    
    protected $table = 'users';

    // Permitir la asignación masiva solo en estos campos
    protected $fillable = [
        'full_name', 'username', 'password', 'email', 'phone', 
        'address', 'postal_code', 'birth_date', 'user_type', 'history', 'registration_date'
    ];

    // Relacion Uno a Muchos
    public function orders()
    {
        return $this->hasMany(Order::class);
    }

}

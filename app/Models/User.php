<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory;
    
    // Permitir la asignación masiva solo en estos campos
    protected $fillable = [
        'full_name', 'username', 'password', 'email', 'phone', 
        'address', 'postal_code', 'birth_date', 'user_type', 'history', 'registration_date'
    ];

}

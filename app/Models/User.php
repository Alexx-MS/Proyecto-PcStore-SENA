<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable; // Aquí extiendes de Authenticatable
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable // Cambié la extensión de Model a Authenticatable
{
    use HasFactory, Notifiable;  // Notifiable es importante para notificaciones

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

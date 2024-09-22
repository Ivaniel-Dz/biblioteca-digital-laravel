<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'role',  // Incluimos el campo role en fillable
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // Función para verificar si el usuario es admin
    public function isAdmin()
    {
        return $this->role === 'admin';
    }

    // Función para verificar si el usuario es normal
    public function isUser()
    {
        return $this->role === 'user';
    }

    // The user's loans.
    public function prestamos()
    {
        return $this->hasMany(Prestamo::class);
    }

    // The user's reservations.
    public function reservas()
    {
        return $this->hasMany(Reserva::class);
    }

    // The user's fines.
    public function multas()
    {
        return $this->hasMany(Multa::class);
    }

    // The user's history.
    public function historial()
    {
        return $this->hasMany(HistorialUsuario::class);
    }


    // The user's book activities.     
    public function actividadesLibros()
    {
        return $this->hasMany(ActividadUsuarioLibro::class);
    }
}

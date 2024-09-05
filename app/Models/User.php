<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'rol'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    /**
     * Check if the user is an admin.
     *
     * @return bool
     */
    public function isAdmin()
    {
        return $this->rol === 'admin';
    }

    /**
     * Check if the user is a regular user.
     *
     * @return bool
     */
    public function isRegularUser()
    {
        return $this->rol === 'usuario';
    }

    /**
     * The user's loans.
     */
    public function prestamos()
    {
        return $this->hasMany(Prestamo::class);
    }

    /**
     * The user's reservations.
     */
    public function reservas()
    {
        return $this->hasMany(Reserva::class);
    }

    /**
     * The user's fines.
     */
    public function multas()
    {
        return $this->hasMany(Multa::class);
    }

    /**
     * The user's history.
     */
    public function historial()
    {
        return $this->hasMany(HistorialUsuario::class);
    }

    /**
     * The user's book activities.
     */
    public function actividadesLibros()
    {
        return $this->hasMany(ActividadUsuarioLibro::class);
    }
}

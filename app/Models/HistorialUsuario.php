<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HistorialUsuario extends Model
{
    protected $fillable = ['user_id', 'accion', 'descripcion', 'tiene_multas'];

    public function usuario()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}

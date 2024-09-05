<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ActividadUsuarioLibro extends Model
{
    protected $fillable = ['user_id', 'libro_id', 'tipo_actividad', 'fecha_actividad', 'descripcion'];

    public function usuario()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function libro()
    {
        return $this->belongsTo(Libro::class, 'libro_id');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Prestamo extends Model
{
    protected $fillable = ['user_id', 'libro_id', 'fecha_prestamo', 'fecha_devolucion'];

    public function usuario()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}

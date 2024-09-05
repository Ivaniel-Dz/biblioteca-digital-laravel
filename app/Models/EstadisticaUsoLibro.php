<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EstadisticaUsoLibro extends Model
{
    protected $fillable = ['libro_id', 'prestamos', 'reservas', 'devoluciones'];

    public function libro()
    {
        return $this->belongsTo(Libro::class);
    }
}


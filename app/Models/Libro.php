<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Libro extends Model
{
    protected $fillable = [
        'titulo', 
        'isbn', 
        'año_publicacion', 
        'autor_id', 
        'categoria_id', 
    ];

    // Relación con la tabla autores
    public function autor()
    {
        return $this->belongsTo(Autor::class, 'autor_id');
    }

    // Relación con la tabla categorías
    public function categoria()
    {
        return $this->belongsTo(Categoria::class, 'categoria_id');
    }

    // Relación con préstamos
    public function prestamos()
    {
        return $this->hasMany(Prestamo::class);
    }

    // Relación con reservas
    public function reservas()
    {
        return $this->hasMany(Reserva::class);
    }

    // Relación con devoluciones
    public function devoluciones()
    {
        return $this->hasMany(Devolucion::class);
    }

    // Relación con estadísticas de uso
    public function estadisticasUso()
    {
        return $this->hasOne(EstadisticaUsoLibro::class);
    }
}

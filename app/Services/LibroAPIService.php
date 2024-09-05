<?php
namespace App\Services;

use Illuminate\Support\Facades\Http;

class LibroAPIService
{
    protected $apiUrl = 'https://openlibrary.org/search.json?q=tes'; // Cambia a la URL de la API que utilizarás

    public function buscarLibros($query)
    {
        $response = Http::get($this->apiUrl, [
            'q' => $query,
        ]);

        if ($response->successful()) {
            return $response->json();
        }

        return null; // Manejar errores o excepciones
    }

    public function obtenerLibroPorId($id)
    {
        $response = Http::get("{$this->apiUrl}/{$id}");

        if ($response->successful()) {
            return $response->json();
        }

        return null; // Manejar errores o excepciones
    }
}

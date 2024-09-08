<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Facades\Http;

class BookApiController extends Controller
{
    public function index()
    {
        // Consumir la API de Open Library
        $response = Http::get('https://openlibrary.org/subjects/science_fiction.json?limit=10');
        $libros = $response->json()['works'] ?? [];

        // Pasar los datos a la vista
        return Inertia::render('Inicio', [
            'books' => $libros
        ]);
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class BookApiController extends Controller
{
    public function index(Request $request)
    {
        // Obtener el término de búsqueda del request, si no hay, buscar libros populares por defecto
        $searchQuery = $request->input('q', 'popular');

        // URL del API de Open Library
        $url = 'https://openlibrary.org/search.json?q=' . urlencode($searchQuery);

        // Consumir el API usando el cliente HTTP de Laravel
        $response = Http::timeout(60)->get($url);

        // Verificar si la respuesta fue exitosa
        if ($response->successful()) {
            // Obtener los libros en formato JSON
            $booksData = $response->json();

            // Filtrar solo los datos importantes (ejemplo: título, autor, año de publicación)
            $books = collect($booksData['docs'])->map(function($book) {
                return [
                    'title' => $book['title'],
                    'author' => $book['author_name'][0] ?? 'Desconocido',
                    'published_year' => $book['first_publish_year'] ?? 'N/A',
                    'isbn' => $book['isbn'][0] ?? 'N/A'
                ];
            });

            // Pasar los datos a la vista con Inertia
            return inertia('LandingPage/Books', [
                'books' => $books,
                'searchQuery' => $searchQuery
            ]);
        }

        // Si hay un error en la solicitud, manejarlo aquí
        return inertia('LandingPage/Books', [
            'books' => [],
            'error' => 'No se pudieron obtener los libros del API de Open Library'
        ]);
    }
}

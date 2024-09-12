<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class BookApiController extends Controller
{
    public function index()
    {
        // Obtener los libros desde la API
        $response = Http::get('https://openlibrary.org/subjects/science_fiction.json?limit=16');
        $books = $response->json()['works'];

        // Procesar los libros para incluir la portada
        $books = collect($books)->map(function ($book) {
            // Construir la URL de la portada, si existe
            if (isset($book['cover_id'])) {
                $book['cover_image'] = 'https://covers.openlibrary.org/b/id/' . $book['cover_id'] . '-L.jpg';
            } else {
                // Si no tiene portada, usar una imagen personalizada
                $book['cover_image'] = asset('images/no-cover.png');
            }

            return $book;
        });

        // Retornar los libros como respuesta JSON
        return response()->json([
            'books' => $books,
        ]);
    }
}

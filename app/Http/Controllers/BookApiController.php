<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class BookApiController extends Controller
{
    public function index()
    {
        // Obtener los libros desde la API
        $response = Http::get('https://openlibrary.org/subjects/science_fiction.json?limit=10');
        $books = $response->json()['works'];

        // Retornar los libros como respuesta JSON
        return response()->json([
            'books' => $books,
        ]);
    }
}

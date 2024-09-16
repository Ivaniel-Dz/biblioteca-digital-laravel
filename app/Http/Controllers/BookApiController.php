<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Inertia\Inertia;

class BookApiController extends Controller {

    public function index() {
        // Obtener los libros desde la API
        $genre = "science";

        $response = Http::get("https://openlibrary.org/subjects/{$genre}.json?limit=16");
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


    // Obtiene libro seleccionado por genero
    public function view($genre) {

        $response = Http::get("https://openlibrary.org/subjects/{$genre}.json");
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

        return Inertia::render('LandingPage/Layouts/SubjectView', [
            'libros' => $books,
            'title' => $genre,
        ]);
    }

    
    // Obtiene libro seleccionado por id
    public function show($id) {
        // Asegúrate de eliminar el prefijo '/works/' si está presente
        $id = str_replace('/works/', '', $id);

        $response = Http::get("https://openlibrary.org/works/{$id}.json");
        $book = $response->json();

        if (!$book) {
            abort(404, 'Libro no encontrado');
        }

        return Inertia::render('LandingPage/Layouts/SelectedBook', [
            'book' => $book
        ]);
    }

    
    // Busca libros según el término ingresado
    public function search(Request $request)
    {
        // Validamos que el término no esté vacío
        $request->validate([
            'query' => 'required|string|min:3',
        ]);

        $query = $request->input('query');
        
        // Consulta a la API de Open Library para buscar libros
        $response = Http::get("https://openlibrary.org/search.json", [
            'q' => $query
        ]);
        
        $books = $response->json()['docs'];

        $books = collect($books)->map(function ($book) {
            if (isset($book['cover_i'])) {
                $book['cover_image'] = 'https://covers.openlibrary.org/b/id/' . $book['cover_i'] . '-L.jpg';
            } else {
                $book['cover_image'] = asset('images/no-cover.png');
            }

            return $book;
        });

        return Inertia::render('LandingPage/Layouts/SearchResults', [
            'books' => $books,
            'query' => $query,
        ]);
    }

}

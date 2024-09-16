<?php

namespace App\Http\Controllers;

use App\Models\Prestamo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Inertia\Inertia;

class PrestamoController extends Controller
{
    // Muestra (get)  la tabla de usuarios con sus prestamos
    public function index()
    {
        return Inertia::render('Prestamos/Index',['prestamos'=> Prestamo::with('libro', 'usuario')->paginate(5)]);
    }

    // Redirige al formulario
    public function create($id)
    {
        // Asegúrate de eliminar el prefijo '/works/' si está presente
        $id = str_replace('/works/', '', $id);

        $response = Http::get("https://openlibrary.org/works/{$id}.json");
        $book = $response->json();

        if(!$book) {
            abort(404, 'Libro no encontrado');
        }

        return Inertia::render('Prestamos/Create', [
            'book' => $book
        ]);
    }

    // Guardar (POST) el Formulario
    public function store(Request $request)
    {
        $request->validate([
            'libro_id' => 'required|exists:libros,id',
            'fecha_prestamo' => 'required|date',
        ]);

        Prestamo::create([
            'user_id' => auth()->id(),
            'libro_id' => $request->libro_id,
            'fecha_prestamo' => $request->fecha_prestamo,
        ]);

        return redirect()->route('prestamos.index');
    }

    // Actualiza (PUT) los datos
    public function update(Request $request, Prestamo $prestamo)
    {
        $prestamo->update([
            'fecha_devolucion' => now(),
        ]);

        return redirect()->route('prestamos.index');
    }
}

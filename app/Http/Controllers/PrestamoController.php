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
        return Inertia::render('Prestamos/Index', ['prestamos' => Prestamo::with('usuario')->paginate(5)]);
    }

    // Redirige al formulario
    public function create($id)
    {
        // Asegúrate de eliminar el prefijo '/works/' si está presente
        $id = str_replace('/works/', '', $id);

        $response = Http::get("https://openlibrary.org/works/OL{$id}W.json");
        $book = $response->json();

        if (!$book) {
            abort(404, 'Libro no encontrado');
        }

        return Inertia::render('Prestamos/Create', [
            'book' => $book
        ]);
    }

    // Guardar (POST) el Formulario
 public function store(Request $request)
{
    try {
        $request->validate([
            'libro_id' => 'required|numeric',
            'fecha_prestamo' => 'required|date',
        ]);

        Prestamo::create([
            'user_id' => auth()->id(),
            'libro_id' => $request->libro_id,
            'fecha_prestamo' => $request->fecha_prestamo,
        ]);

        return response()->json(['message' => 'Cita guardada exitosamente!'], 201);
    } catch (\Exception $e) {
        return response()->json(['error' => 'Error al guardar el préstamo', 'details' => $e->getMessage()], 500);
    }
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

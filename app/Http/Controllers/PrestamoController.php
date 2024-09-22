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
        return Inertia::render('Prestamos/Index', ['prestamos' => Prestamo::with('usuario')->paginate(10)]);
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

            return response()->json(['message' => 'Registro guardada exitosamente!'], 201);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Error al guardar el registro', 'details' => $e->getMessage()], 500);
        }
    }

    // Actualiza (PUT) los datos
    public function update($id)
    {
        $prestamo = Prestamo::findOrFail($id);
        $prestamo->update([
            'fecha_devolucion' => now(),
        ]);

        return response()->json(['message' => 'Préstamo actualizado'], 200);
    }


    // Muestra el historial de prestamo de un usuario especifico
    public function historial()
    {
        return Inertia::render('Prestamos/Historial', ['prestamos' => Prestamo::with('usuario')->paginate(10)]);
    }
}

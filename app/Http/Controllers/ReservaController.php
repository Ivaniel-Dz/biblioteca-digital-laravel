<?php

namespace App\Http\Controllers;

use App\Models\Reserva;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Inertia\Inertia;

class ReservaController extends Controller
{
    // get: muestra la tabla de registro
    public function index()
    {
        return Inertia::render('Reservas/Index', ['reservas' => Reserva::with('usuario')->paginate(10)]);
    }

    // get: muestra el formulario a llenar
    public function create($id)
    {
        // Asegúrate de eliminar el prefijo '/works/' si está presente
        $id = str_replace('/works/', '', $id);

        $response = Http::get("https://openlibrary.org/works/OL{$id}W.json");
        $book = $response->json();

        if (!$book) {
            abort(404, 'Libro no encontrado');
        }

        return Inertia::render('Reservas/Create', [
            'book' => $book
        ]);
    }

    // put: guarda el formulario
    public function store(Request $request)
    {
        try {
            $request->validate([
                'libro_id' => 'required|numeric',
                'fecha_reserva' => 'required|date',
            ]);

            Reserva::create([
                'user_id' => auth()->id(),
                'libro_id' => $request->libro_id,
                'fecha_reserva' => $request->fecha_reserva,
            ]);

            return response()->json(['message' => 'Registro guardada exitosamente!'], 201);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Error al guardar el registro', 'details' => $e->getMessage()], 500);
        }
    }

    // delete: elimina el registro
    public function destroy($id)
    {
        $reserva = Reserva::findOrFail($id);
        $reserva->delete();
        
        return response()->json(['message' => 'Reserva cancelada'], 200);
    }

    // Muestra el historial de reservas de un usuario especifico
    public function historial()
    {
        $usuarioId = auth()->id(); // Obtiene el ID del usuario autenticado
        $reservas = Reserva::with('usuario')->where('user_id', $usuarioId)->paginate(10);

        return Inertia::render('Reservas/Historial', [
            'reservas' => $reservas,
            'usuarioId' => $usuarioId,
        ]);
    }
}

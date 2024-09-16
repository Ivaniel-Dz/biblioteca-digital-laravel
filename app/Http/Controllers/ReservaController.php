<?php

namespace App\Http\Controllers;

use App\Models\Reserva;
use App\Models\Libro;
use Illuminate\Http\Request;

class ReservaController extends Controller
{
    public function index()
    {
        $reservas = Reserva::with('libro', 'usuario')->get();
        return view('reservas.index', compact('reservas'));
    }

    public function create()
    {
        $libros = Libro::all();
        return view('reservas.create', compact('libros'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'libro_id' => 'required|exists:libros,id',
            'fecha_reserva' => 'required|date',
        ]);

        Reserva::create([
            'user_id' => auth()->id(),
            'libro_id' => $request->libro_id,
            'fecha_reserva' => $request->fecha_reserva,
        ]);

        return redirect()->route('reservas.index');
    }

    public function destroy(Reserva $reserva)
    {
        $reserva->delete();
        return redirect()->route('reservas.index');
    }
}

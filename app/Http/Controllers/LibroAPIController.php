<?php

namespace App\Http\Controllers;

namespace App\Http\Controllers;

use App\Services\LibroAPIService;
use Illuminate\Http\Request;

class LibroAPIController extends Controller
{
    protected $libroAPIService;

    public function __construct(LibroAPIService $libroAPIService)
    {
        $this->libroAPIService = $libroAPIService;
    }

    public function buscar(Request $request)
    {
        $query = $request->input('query');
        $libros = $this->libroAPIService->buscarLibros($query);

        if ($libros) {
            return response()->json($libros, 200);
        }

        return response()->json(['error' => 'Libros no encontrados'], 404);
    }

    public function mostrar($id)
    {
        $libro = $this->libroAPIService->obtenerLibroPorId($id);

        if ($libro) {
            return response()->json($libro, 200);
        }

        return response()->json(['error' => 'Libro no encontrado'], 404);
    }
}

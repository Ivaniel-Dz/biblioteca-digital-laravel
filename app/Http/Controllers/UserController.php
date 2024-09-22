<?php

namespace App\Http\Controllers;

use App\Models\User;
use Inertia\Inertia;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index()
    {
        return Inertia::render('Users/Index', [
            'users' => User::paginate()
        ]);
    }

    public function dashboard()
    {
        $user = Auth::user();  // Obtener el usuario autenticado
        $role = $user->role;    // Obtener el rol del usuario

        if ($role === 'admin') {
            // Si es admin, redirigir al dashboard del admin
            return Inertia::render('Dashboard', [
                'user' => $user,
                'role' => $role,
            ]);
        } else {
            // Si es usuario normal, redirigir al dashboard de usuario
            return Inertia::render('Dashboard', [
                'user' => $user,
                'role' => $role,
            ]);
        }
    }
}

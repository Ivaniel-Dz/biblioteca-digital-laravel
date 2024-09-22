<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\BookApiController;
use App\Http\Controllers\PrestamoController;
use App\Http\Controllers\ReservaController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// Ruta de inicio
Route::get('/', function () {
    // Datos de canLogin y canRegister
    $loginData = [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
    ];

    // Llamada al controlador de libros
    $bookController = new BookApiController();
    $apiResponse = $bookController->index();

    // Convertir la respuesta a array
    $apiData = json_decode(json_encode($apiResponse->getData()), true);

    // Fusionar ambas respuestas
    return Inertia::render('Inicio', array_merge($loginData, $apiData));
});

// Rutas de libros
Route::get('/subjects/{genre}', [BookApiController::class, 'view'])->name('book.view');
Route::get('/book/{id}', [BookApiController::class, 'show'])->name('book.show');
Route::get('/search', [BookApiController::class, 'search'])->name('book.search');

// Rutas de Dashboard
Route::get('/dashboard', [UserController::class, 'dashboard'])
    ->middleware(['auth', 'verified'])  // Proteger la ruta del dashboard con autenticación
    ->name('dashboard');

// Rutas solo para administradores
Route::middleware(['auth', 'admin'])->group(function () {
    // Dashboard de administrador
    Route::get('/admin', [UserController::class, 'adminDashboard'])->name('admin.dashboard');
    
    // Gestión de usuarios
    Route::get('/users', [UserController::class, 'index'])->name('users.index');
});

// Rutas accesibles para cualquier usuario autenticado
Route::middleware('auth')->group(function () {
    // Información sobre la aplicación
    Route::get('/about', fn () => Inertia::render('About'))->name('about');

    // Perfil de usuario
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Rutas para préstamos y reservas (usuarios normales)
    Route::get('/prestamos', [PrestamoController::class, 'index'])->name('prestamos.index');
    Route::get('/prestamos/create/{id}', [PrestamoController::class, 'create'])->name('prestamos.create');
    Route::post('/prestamos', [PrestamoController::class, 'store'])->name('prestamos.store');
    Route::put('/prestamos/{id}', [PrestamoController::class, 'update'])->name('prestamos.update');
    
    Route::get('/reservas', [ReservaController::class, 'index'])->name('reservas.index');
    Route::get('/reservas/create/{id}', [ReservaController::class, 'create'])->name('reservas.create');
    Route::post('/reservas', [ReservaController::class, 'store'])->name('reservas.store');
    Route::delete('/reservas/{id}', [ReservaController::class, 'destroy'])->name('reservas.destroy');
});

// Rutas de autenticación proporcionadas por Laravel Breeze
require __DIR__.'/auth.php';

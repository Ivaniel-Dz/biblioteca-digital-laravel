<?php

use App\Http\Controllers\BookApiController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

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

// Redirigir por id a un libro
Route::get('/libro/{id}', [BookApiController::class, 'show'])->name('book.show');

Route::get('/subjects/{name}', [BookApiController::class, 'view'])->name('book.view');

// Rutas de Dashboard
Route::get('/dashboard', function () {
    return Inertia::render('Dashboard/User/Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/about', fn () => Inertia::render('About'))->name('about');

    Route::get('users', [UserController::class, 'index'])->name('users.index');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

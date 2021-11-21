<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\InicioController;

// Ruta de pagina de inicio
Route::get('/', [InicioController::class, 'index'])->name('home.index');

// Ruta nuestra empresa
Route::get('/nuestra-empresa', [InicioController::class, 'empresa'])->name('home.empresa');

// Ruta nuestros servicios
Route::get('/nuestros-servicios', [InicioController::class, 'servicios'])->name('home.servicios');

// Ruta nuestros sedes
Route::get('/sedes', [InicioController::class, 'sedes'])->name('home.sedes');

// Ruta pagina contacto
Route::get('/contactanos', [InicioController::class, 'contacto'])->name('home.contacto');

//Ruta para mostrar posts publicados
Route::get('/posts', [PostController::class, 'index'])->name('posts.index');

//Ruta para acceder al post
Route::get('posts/{post}', [PostController::class, 'show'])->name('posts.show');

//Ruta para acceder a las categorias
Route::get('categoria/{categoria}', [PostController::class, 'categoria'])->name('posts.categoria');

//Ruta para acceder a las etiquetas
Route::get('etiqueta/{etiqueta}', [PostController::class, 'etiqueta'])->name('posts.etiqueta');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
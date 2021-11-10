<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\InicioController;

Route::get('/', [InicioController::class, 'index'])->name('home.index');

Route::get('/nuestra-empresa', [InicioController::class, 'nuestraEmpresa'])->name('home.nuestra-empresa');

Route::get('/nuestros-servicios', [InicioController::class, 'servicios'])->name('home.servicios');

Route::get('/posts', [PostController::class, 'index'])->name('posts.index');

//Ruta para acceder al post
Route::get('posts/{post}', [PostController::class, 'show'])->name('posts.show');

//Ruta para acceder a las categorias
Route::get('/{categoria}', [PostController::class, 'categoria'])->name('posts.categoria');

//Ruta para acceder a las etiquetas
Route::get('etiqueta/{etiqueta}', [PostController::class, 'etiqueta'])->name('posts.etiqueta');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
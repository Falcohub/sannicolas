<?php

// ingresar directamente al panel de administracion al iniciar secion 

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\CategoriaController;
use App\Http\Controllers\Admin\EtiquetaController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\UserController;

// Asignar control de ruta a controlador
Route::get('', [HomeController::class, 'index'])->name('admin.home');

//Rutas crud categorias
Route::resource('users', UserController::class)->only(['index', 'edit', 'update'])->names('admin.users');

//Rutas crud categorias
Route::resource('categorias', CategoriaController::class)->names('admin.categorias');

// Rutas crud etiqueta
Route::resource('etiquetas', EtiquetaController::class)->names('admin.etiquetas');

// Rutas crud posts 
Route::resource('posts', PostController::class)->names('admin.posts');
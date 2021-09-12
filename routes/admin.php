<?php

// ingresar directamente al panel de administracion al iniciar secion 

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\CategoriaController;

// Asignar control de ruta a controlador
Route::get('', [HomeController::class, 'index'])->name('admin.home');

Route::resource('categorias', CategoriaController::class)->names('admin.categorias');
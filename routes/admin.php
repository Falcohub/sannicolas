<?php

// ingresar directamente al panel de administracion al iniciar secion 

use Illuminate\Support\Facades\Route;

// Asignar control de ruta a controlador
use App\Http\Controllers\Admin\HomeController;

Route::get('', [HomeController::class, 'index']);
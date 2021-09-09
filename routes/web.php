<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;

Route::get('/', [PostController::class, 'index'])->name('posts.index');

//Ruta para acceder al post
Route::get('posts/{post}', [PostController::class, 'show'])->name('posts.show');

Route::get('categoria/{categoria}', [PostController::class, 'categoria'])->name('posts.categoria');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
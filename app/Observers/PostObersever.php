<?php

namespace App\Observers;

use App\Models\Post;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Storage;

class PostObersever
{
    public function creating(Post $post)
    {
        // Asignar el id al post del usuario autenticado, hacerlo desde el backend mas seguridad
        // Ejecutar solo si no se esta ingresando registros desde la consola 
        if (! \App::runningInConsole()) {
            $post->user_id = auth()->user()->id;
        }
    }

    // deleting: este evento se activa antes de eliminar el post 
    public function deleting(Post $post)
    {
        // Si el post tiene imagen asociada
        if ($post->imagen) {

            // Eliminar
            Storage::delete($post->imagen->img_url);
        }
    }
}

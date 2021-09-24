<?php

namespace App\Policies;

use App\Models\Post;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class PostPolicy
{
    use HandlesAuthorization;

    // Verificar si un usuario es autor de un post
    public function author(User $user, Post $post){
        
        // verificar si el user que intenta editar el post es el mismo que lo creo
        if ($user->id == $post->user_id) {
            return true;
        }else{
            return false;
        }
    }

    // Permite que un usuario no acceda a un post borrador 
    public function published(?User $user, Post $post){
        if ($post->post_status == 2){
            return true;
        }else{
            return false;
        }
    }
}
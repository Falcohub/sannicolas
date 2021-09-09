<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(){
        $posts = Post::where('post_status', 2)->latest('id')->paginate(8);
        return view('posts.index', compact('posts'));
    }

    //Retornar la vista del post
    public function show(Post $post){

        // Mostrar post similares
        $similares = Post::where('cat_id', $post->cat_id)
                            ->where('post_status', 2) //Post activados
                            ->where('id', '!=', $post->id)//No se repita el post
                            ->latest('id')            //Descendente
                            ->take(4)                 //Solo 4 post
                            ->get();                  

        return view('posts.show', compact('post', 'similares'));
    }

    public function categoria(Categoria $categoria){
        $posts = Post::where('cat_id', $categoria->id)
                        ->where('post_status', 2) //Post activados
                        ->latest('id')
                        ->paginate(6);
        
        return view ('posts.categoria', compact('posts', 'categoria'));
    }
}

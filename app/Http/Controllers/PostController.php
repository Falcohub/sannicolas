<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categoria;
use App\Models\Etiqueta;
use App\Models\Post;

// Implementar cache
use Illuminate\Support\Facades\Cache;
class PostController extends Controller
{
    public function index(){

        // preguntar si por la url estoy enviando la info de la pagina
        if (request()->page) {
            //Si se ha enviado la info en una variable $key lamacenar $post concatenado con la info de la page
            $key = 'posts' . request()->page;
        }else {
            $key = 'posts';
        }

        // Si he almacenado en cache la info de los posts, ingresar al facade cache y al metodo has
        if (Cache::has($key)) {

            // Recuperar ese archivo 
            $posts = Cache::get($key);
        }else {

            // Si no tengo almacenado nada en cache, entonces realizar la consulta en la db
            $posts = Post::where('post_status', 2)->latest('id')->paginate(5);

            // Almacenar la info en cache 
            Cache::put($key, $posts);
        }

        return view('posts.index', compact('posts'));
    }

    //Retornar la vista del post
    public function show(Post $post){

        // Referencia policy
        $this->authorize('published', $post);

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

        // Mostrar posts por categoria
        $posts = Post::where('cat_id', $categoria->id)
                        ->where('post_status', 2) //Post activados
                        ->latest('id')
                        ->paginate(6);
        
        return view ('posts.categoria', compact('posts', 'categoria'));
    }

    public function etiqueta(Etiqueta $etiqueta){

        // Mostrar posts por etiqueta
        $posts =  $etiqueta->posts()->where('post_status', 2)->latest('id')->paginate(6);

        return view('posts.etiqueta', compact('posts', 'etiqueta'));
    }
}

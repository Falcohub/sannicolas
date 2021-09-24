<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Categoria;
use App\Models\Etiqueta;

use Illuminate\Support\Facades\Storage;

use App\Http\Requests\PostRequest;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Vista de posts
        return view('admin.posts.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        // Recuperar las categorias y etiquetas
        // Metodo pluck me va a generar un array pero solo va a tomar el valor del campo name de la categoria
        $categorias = Categoria::pluck('cat_nombre', 'id');
        $etiquetas = Etiqueta::all();

        //Crear de posts
        return view('admin.posts.create', compact('categorias', 'etiquetas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    //Objeto de clase StorePostRequest para obtener las validaciones
    public function store(PostRequest $request)
    {        
        //Agregar nuevo post
        $post = Post::create($request->all());
        
        // mover la imagen de la carpeta temporal a la carpeta storage para que el navegador pueda acceder a ella
        if ($request->file('file')) {
            $url = Storage::put('public/posts', $request->file('file'));
            
            // Generar um muevo registro en la tabla image y relacionarlo
            $post->imagen()->create(['img_url' => $url]);
        }

        // Preguntar si se esta enviando informacion de etiquetas
        // accedemos al registro de post, accedemos a la relacion etiquetas
        // En el metodo attach accedemos al array etiquetas, Agregar en  la tabla etiqueta_post las etiquetas seleccionadas
        if ($request->etiquetas) {
            $post->etiquetas()->attach($request->etiquetas);
        }

        return redirect()->route('admin.posts.edit', $post);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //Vista de posts
        return view('admin.posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        // Referencia policy
        $this->authorize('author', $post);

        /* Recuperar las categorias y etiquetas
        Metodo pluck me va a generar un array pero solo va a tomar el valor del campo name de la categoria */
        $categorias = Categoria::pluck('cat_nombre', 'id');
        $etiquetas = Etiqueta::all();

        // Editar posts 
        return view('admin.posts.edit', compact('post', 'categorias', 'etiquetas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PostRequest $request, Post $post)
    {
        // Referencia policy
        $this->authorize('author', $post);

        $post->update($request->all());

        //Preguntar si esta enviando imagen en el campo file
        if ($request->file('file')) {

            // Subir imagen al servidor
            $url = Storage::put('public/posts', $request->file('file'));

            // Preguntar si el post ya contiene imagen
            if ($post->imagen) {
                
                // Eliminar imagen del post 
                Storage::delete($post->imagen->img_url);

                // Actualizar imagen
                $post->imagen->update([
                    'img_url' => $url
                ]);
            }else{
                // Si no existe imagen asociada, crea nuevo registro en tabla imagens 
                $post->imagen()->create([
                    'img_url' => $url
                ]);
            }
        }

        // Etiquetas 
        if ($request->etiquetas) {

            // Metodo sync sincronizar colección
            $post->etiquetas()->sync($request->etiquetas);
        }

        return redirect()->route('admin.posts.edit', $post)->with('info', 'La publicación se actualizo con éxito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        // Referencia policy
        $this->authorize('author', $post);

        //Eliminar etiqueta
        $post->delete();

        return redirect()->route('admin.posts.index')->with('info', 'La publicación se eliminó con éxito');
    }
}

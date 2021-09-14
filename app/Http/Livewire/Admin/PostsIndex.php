<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Post;

//Clase para paginación
use Livewire\WithPagination;

class PostsIndex extends Component
{
    use WithPagination;

    // Utilizar estilos de tailwind
    protected $paginationTheme = "bootstrap";

    // Esta toma el valor de la barra de busquedad de post 
    public $search;

    //Este metodo solicita que se resetee la informacion de la paginación a medida que se escriba en la barra de busquedad, se activara cuando el valor de la propiedad $search cambie
    public function updatingSearch(){
        $this->resetPage();
    }

    // Redenrizar el contenido de la vista posts-index.blade.php
    public function render()
    {

        // Recuperar listado de post de usuario autentificado, en orden descendente y paginado
        $posts = Post::where('user_id', auth()->user()->id)
                            // Busquedad por LIKE y relacionada a lo que almacena la variable search 
                            ->where('post_name', 'LIKE','%'. $this->search . '%')
                            ->latest('id')
                            ->paginate();

        return view('livewire.admin.posts-index', compact('posts'));
    }
}

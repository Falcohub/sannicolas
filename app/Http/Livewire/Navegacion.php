<?php

namespace App\Http\Livewire;

use App\Models\Categoria;


use Livewire\Component;

class Navegacion extends Component
{
    public function render()
    {
        $categorias = Categoria::all();

        return view('livewire.navegacion', compact('categorias'));
    }
}

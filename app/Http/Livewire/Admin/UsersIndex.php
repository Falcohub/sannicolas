<?php

namespace App\Http\Livewire\Admin;

use App\Models\User;
use Livewire\Component;

use Livewire\WithPagination;

class UsersIndex extends Component
{
    // Usar paginacion
    use WithPagination;

    // para barra de busquedad
    public $search;

    // Indicar utilizar estilos de bootstrap
    protected $paginationTheme = 'bootstrap';

    //Este metodo solicita que resetee la info de la paginación a medida que se escriba en la barra de busquedad, se activara cuando el valor de la propiedad $search cambie
    public function updatingSearch(){
        $this->resetPage();
    }

    public function render()
    {
        // Recuperar listado de usuarios
        $users = User::where('name', 'LIKE', '%' . $this->search . '%')// Busquedad por nombre
                        ->orWhere('email', 'LIKE', '%' . $this->search . '%')// Busquedad por correo 
                        ->paginate(); // Paginacion
        
        return view('livewire.admin.users-index', compact('users'));
    }
}

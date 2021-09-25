<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Categoria;

class CategoriaController extends Controller
{

    public function __construct()
    {
        // Proteger solo la ruta index
        $this->middleware('can:admin.categorias.index')->only('index');
        $this->middleware('can:admin.categorias.create')->only('create', 'store');
        $this->middleware('can:admin.categorias.edit')->only('edit', 'update');
        $this->middleware('can:admin.categorias.destroy')->only('destroy');
    }

    public function index()
    {
        $categorias = Categoria::all();

    return view('admin.categorias.index', compact('categorias'));
    }

    public function create()
    {
        return view('admin.categorias.create');

    }

    public function store(Request $request)
    {
        // reglas de validacion para los campos
        $request->validate([
            'cat_nombre' => 'required',
            'cat_slug' => 'required|unique:categorias'
        ]);

        // Generar un nuevo registro de categoria
        $categoria = Categoria::create($request->all());

        // redireccionar a la vista editar y mostrar mensaje de categoria agregada
        return redirect()->route('admin.categorias.edit', $categoria)->with('info', 'La categoria se creo con éxito');;
    }

    public function edit(Categoria $categoria)
    {
        return view('admin.categorias.edit', compact('categoria'));
    }

    public function update(Request $request, Categoria $categoria)
    {
        // reglas de validacion para los campos
        $request->validate([
            'cat_nombre' => 'required',
            'cat_slug' => "required|unique:categorias,cat_slug,$categoria->id"
        ]);

        // Actualizar
        $categoria->update($request->all());

        //redireccionar y enviar mensaje de actualizacion
        return redirect()->route('admin.categorias.edit', $categoria)->with('info', 'La categoria se actualizó con éxito');
    }

    public function destroy(Categoria $categoria)
    {
        // Eliminar categoria
        $categoria->delete();

        // redireccionar a lista de categoria
        return redirect()->route('admin.categorias.index')->with('info', 'La categoria se eliminó con éxito');
    }
}
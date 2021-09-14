<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Categoria;

class CategoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categorias = Categoria::all();

    return view('admin.categorias.index', compact('categorias'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.categorias.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
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

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Categoria $categoria)
    {
        return view('admin.categorias.index', compact('categoria'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Categoria $categoria)
    {
        return view('admin.categorias.edit', compact('categoria'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
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

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Categoria $categoria)
    {
        // Eliminar categoria
        $categoria->delete();

        // redireccionar a lista de categoria
        return redirect()->route('admin.categorias.index')->with('info', 'La categoria se eliminó con éxito');;
    }
}

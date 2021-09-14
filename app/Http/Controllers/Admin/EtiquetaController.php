<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Etiqueta;

class EtiquetaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Recuperar listado de etiquetas
        $etiquetas = Etiqueta::all();

        //vista de listado de etiquetas
        return view('admin.etiquetas.index', compact('etiquetas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Array para obtener el color 
        $color = [
            'red' => 'Rojo',
            'yellow' => 'Amarillo',
            'green' => 'Verde',
            'blue' => 'Azul',
            'indigo' => 'Indigo',
            'purple' => 'Morado',
            'pink' => 'Rosado',
        ];

        // vista de crear
        return view('admin.etiquetas.create', compact('color'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validar campos
        $request->validate([
            'etq_name' => 'required',
            // el campo slug aparte de ser requerido es unico
            'etq_slug' => 'required|unique:etiquetas',
            'etq_color' => 'required'
        ]);

        //Registrar nueva etiqueta y enviar mensaje
        $etiqueta = Etiqueta::create($request->all())->with('info', 'La etiqueta se creó con éxito');

        // redireccionar
        return redirect()->route('admin.etiquetas.edit', compact('etiqueta'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Etiqueta $etiqueta)
    {
        return view('admin.etiquetas.show', compact('etiqueta'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Etiqueta $etiqueta)
    {
        // Array para obtener el color 
        $color = [
            'red' => 'Rojo',
            'yellow' => 'Amarillo',
            'green' => 'Verde',
            'blue' => 'Azul',
            'indigo' => 'Indigo',
            'purple' => 'Morado',
            'pink' => 'Rosado',
        ];

        //Vista editar
        return view('admin.etiquetas.edit', compact('etiqueta', 'color'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Etiqueta $etiqueta)
    {
        // Validar campos
        $request->validate([
            'etq_name' => 'required',
            // el campo slug aparte de ser requerido es unico
            'etq_slug' => "required|unique:etiquetas,etq_slug,$etiqueta->id",
            'etq_color' => 'required'
        ]);

        //Actualizar etiqueta
        $etiqueta->update($request->all());

        // redirecionar con mensaje
        return redirect()->route('admin.etiquetas.edit', $etiqueta)->with('info', 'La etiqueta se actualizó con éxito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Etiqueta $etiqueta)
    {
        //Eliminar etiqueta
        $etiqueta->delete();

        return redirect()->route('admin.etiquetas.index')->with('info', 'La etiqueta se eliminó con éxito');
    }
}

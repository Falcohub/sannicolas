<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Etiqueta;

class EtiquetaController extends Controller
{

    public function __construct()
    {
        // Proteger solo la ruta index
        $this->middleware('can:admin.etiquetas.index')->only('index');
        $this->middleware('can:admin.etiquetas.create')->only('create', 'store');
        $this->middleware('can:admin.etiquetas.edit')->only('edit', 'update');
        $this->middleware('can:admin.etiquetas.destroy')->only('destroy');
    }

    public function index()
    {
        // Recuperar listado de etiquetas
        $etiquetas = Etiqueta::all();

        //vista de listado de etiquetas
        return view('admin.etiquetas.index', compact('etiquetas'));
    }

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

    public function destroy(Etiqueta $etiqueta)
    {
        //Eliminar etiqueta
        $etiqueta->delete();

        return redirect()->route('admin.etiquetas.index')->with('info', 'La etiqueta se eliminó con éxito');
    }
}
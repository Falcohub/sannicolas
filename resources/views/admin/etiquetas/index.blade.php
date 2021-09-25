@extends('adminlte::page')

@section('title', 'Panel de administración')

@section('content_header')

    @can('admin.etiquetas.create')
    <a class="btn btn-secondary btn-sm float-right" href="{{route('admin.etiquetas.create')}}">Nueva etiqueta</a>
    @endcan

    <h1>Mostral listado de etiquetas</h1>
@stop

@section('content')

    {{-- Imprimir mensaje de actualizacion --}}
    @if (session('info'))
        <div class="alert alert-success">
            <strong>{{session('info')}}</strong>
        </div>
    @endif

    <div class="card">
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th colspan="2"></th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($etiquetas as $etiqueta)
                        <tr>
                            <td>{{$etiqueta->id}}</td>
                            <td>{{$etiqueta->etq_name}}</td>
                            <td width="10px">
                                @can('admin.etiquetas.edit')
                                    <a class="btn btn-primary btn-sm" href="{{route('admin.etiquetas.edit', $etiqueta)}}">Editar</a>    
                                @endcan
                            </td>
                            <td width="10px">
                                @can('admin.etiquetas.destroy')    
                                    {{-- se debe crear form para el boton eliminar --}}
                                    <form action="{{route('admin.etiquetas.destroy', $etiqueta)}}" method="POST">
                                    @csrf
                                    @method('delete')
                                    
                                    <button class="btn btn-danger btn-sm" type="submit">Eliminar</button>
                                @endcan
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@stop
@extends('adminlte::page')

@section('title', 'Panel de administración')

@section('content_header')

    @can('admin.categorias.create')
        <a class="btn btn-secondary btn-sm float-right" href="{{route('admin.categorias.create')}}">Agregar categoria</a> 
    @endcan
    <h1>Lista de categorias</h1>
@stop

@section('content')

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
                    @foreach ($categorias as $categoria)
                        <tr>
                            <td>{{$categoria->id}}</td>
                            <td>{{$categoria->cat_nombre}}</td>
                            <td width="10px">
                                @can('admin.categorias.edit')
                                    <a class="btn btn-primary btn-sm" href="{{route('admin.categorias.edit', $categoria)}}">Editar</a>   
                                @endcan
                            </td>
                            <td width="10px">
                                @can('admin.categorias.destroy')
                                    <form action="{{route('admin.categorias.destroy', $categoria)}}" method="POST">
                                        @csrf
                                        @method('delete')
                                        
                                        <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                                    </form>
                                @endcan
                            </td>
                        </tr>        
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@stop
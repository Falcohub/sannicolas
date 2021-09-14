@extends('adminlte::page')

@section('title', 'Panel de administración')

@section('content_header')
    <h1>Crear etiqueta</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            {{-- Formulario con Laravel Collective, no es necesario csrf ya que este lo trae  --}}
            {!! Form::open(['route' => 'admin.etiquetas.store']) !!}
                
                {{-- Se incluyen los campos del formulario definidos en la vista form.blade.php  --}} 
                @include('admin.etiquetas.partials.form')
                    
                {!! Form::submit('Crear etiqueta', ['class' => 'btn btn-primary']) !!}
            {!! Form::close() !!}

        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')

{{-- se instala plugin de JQuery para realizar slug --}}
    <script src="{{asset('vendor/jQuery-Plugin-stringToSlug-1.3/jquery.stringToSlug.min.js')}}"></script>

    {{-- script para el relleno automatico del campo slug --}}
    <script>
        $(document).ready( function() {
            $("#etq_name").stringToSlug({
                setEvents: 'keyup keydown blur',
                getPut: '#etq_slug',
                space: '-'
            });
        });
    </script>

@endsection
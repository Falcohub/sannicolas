@extends('adminlte::page')

@section('title', 'Panel de administración')

@section('content_header')
    <h1>Crear nueva categoria</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            {!! Form::open(['route' => 'admin.categorias.store']) !!}

                <div class="form-group">
                    {!! Form::label('cat_nombre', 'Nombre') !!}
                    {!! Form::text('cat_nombre', null, ['class' => 'form-control', 'placeholder' => 'ingrese el nombre de la categoria']) !!}

                    {{-- error de validacion --}}
                    @error('cat_nombre')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>

                <div class="form-group">
                    {!! Form::label('cat_slug', 'Slug') !!}
                    {!! Form::text('cat_slug', null, ['class' => 'form-control', 'placeholder' => 'ingrese el slug de la categoria', 'readonly']) !!}

                    {{-- error de validacion --}}
                    @error('cat_slug')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>

                {!! Form::submit('Crear categoria', ['class' => 'btn btn-primary']) !!}

            {!! Form::close() !!}
        </div>
    </div>
@stop

@section('js')

{{-- se instala plugin de JQuery para realizar slug --}}
    <script src="{{asset('vendor/jQuery-Plugin-stringToSlug-1.3/jquery.stringToSlug.min.js')}}"></script>

    {{-- script para el relleno automatico del campo slug --}}
    <script>
        $(document).ready( function() {
            $("#cat_nombre").stringToSlug({
                setEvents: 'keyup keydown blur',
                getPut: '#cat_slug',
                space: '-'
            });
        });
    </script>

@endsection
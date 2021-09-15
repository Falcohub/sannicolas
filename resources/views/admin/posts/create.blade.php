@extends('adminlte::page')

@section('title', 'Panel de administración')

@section('content_header')
    <h1>Crear publicación</h1>
@stop

@section('content')

    {{-- Formulario para crear post --}}
    <div class="card">
        <div class="card-body">
            {!! Form::open(['route' => 'admin.posts.store', 'autocomplete' => 'off']) !!}

            {{-- Nombre del post --}}
            <div class="form-group">
                {!! Form::label('post_name', 'Nombre:') !!}
                {!! Form::text('post_name', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el nombre de la publicación']) !!}
            </div>

            {{-- Slug del post --}}
            <div class="form-group">
                {!! Form::label('post_slug', 'slug:') !!}
                {!! Form::text('post_slug', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el slug de la publicación', 'readonly']) !!}
            </div>

            {{-- Campo categorias obtenidas por un select  --}}
            <div class="form-group">
                {!! Form::label('cat_id', 'Categoría')!!}
                {!! Form::select('cat_id', $categorias, null, ['class' => 'form-control'])!!}
            </div>
            
            {{-- Campo etiquetas --}}
            <div class="form-group">
                <p class="font-weight-bold">Etiquetas</p>

                @foreach ($etiquetas as $etiqueta)

                    <label class="mr-2">
                        {!! Form::checkbox('etiquetas[]', $etiqueta->id, null) !!}
                    </label>
                    {{$etiqueta->etq_name}}
                @endforeach
            </div>

            {{-- Estado del post  --}}
            <div class="form group">
                <p class="font-weight-bold">Estado</p>

                <label>
                    {!! Form::radio('post_status', 1, true) !!}
                    Borrador
                </label>

                <label>
                    {!! Form::radio('post_status', 2) !!}
                    Publicado
                </label>
            </div>

            {{-- Campo extracto del post --}}
            <div class="form-group">
                {!! Form::label('post_extract', 'Extracto:') !!}
                {!! Form::textarea('post_extract', null, ['class' => 'form-control']) !!}
            </div>

            {{-- Campo body del post --}}
            <div class="form-group">
                {!! Form::label('post_body', 'Cuerpo de la publicación:') !!}
                {!! Form::textarea('post_body', null, ['class' => 'form-control']) !!}
            </div>
            
            {{-- Boton crear post --}}
            {!! Form::submit('Crear Publicación', ['class' => 'btn btn-primary']) !!}

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

    {{-- Plugin CKEditor para darle estilo a los textos del extracto y body  --}}
    <script src="https://cdn.ckeditor.com/ckeditor5/29.2.0/classic/ckeditor.js"></script>

    {{-- script para el relleno automatico del campo slug --}}
    <script>
        $(document).ready( function() {
            $("#post_name").stringToSlug({
                setEvents: 'keyup keydown blur',
                getPut: '#post_slug',
                space: '-'
            });
        });

    // Scrip del CKEditor en el extracto
    ClassicEditor
        .create( document.querySelector( '#post_extract' ) )
        .catch( error => {
            console.error( error );
    } );
    
    // Scrip del CKEditor en el body
    ClassicEditor
        .create( document.querySelector( '#post_body' ) )
        .catch( error => {
            console.error( error );
    } );

    </script>

@endsection
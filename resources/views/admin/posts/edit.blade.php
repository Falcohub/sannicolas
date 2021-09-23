@extends('adminlte::page')

@section('title', 'Panel de administración')

@section('content_header')
    <h1>Editar publicación</h1>
@stop

@section('content')

    {{-- Imprimir mensaje de borrado --}}
    @if (session('info'))
        <div class="alert alert-success">
            <strong>{{session('info')}}</strong>
        </div>
    @endif

    {{-- Formulario editar post --}}
    <div class="card">
        <div class="card-body">
            {{-- Abrir informacion del post seleccionado Form:model --}}
            {!! Form::model($post,['route' => ['admin.posts.update', $post], 'autocomplete' => 'off', 'files' => true, 'method' => 'put']) !!}

            @include('admin.posts.partials.form')
            
            {{-- Boton crear post --}}
            {!! Form::submit('Actualizar publicación', ['class' => 'btn btn-primary']) !!}

            {!! Form::close() !!}
        </div>
    </div>
@stop

@section('css')

    {{-- Estilos para la imagen --}}
    <style>
        .image-wrapper{
            position: relative;
            padding-bottom: 56.25%;
        }

        .image-wrapper img{
            position: absolute;
            object-fit: cover;
            width: 100%;
            height: 100%;
        }
    </style>
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

    // cambiar imagen
    document.getElementById("file").addEventListener('change', cambiarImagen);

        function cambiarImagen(event){
            var file = event.target.files[0];

            var reader = new FileReader();
            reader.onload = (event) => {
                document.getElementById("picture").setAttribute('src', event.target.result);
            };

            reader.readAsDataURL(file);
        }
    </script>

@endsection
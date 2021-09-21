@extends('adminlte::page')

@section('title', 'Panel de administración')

@section('content_header')
    <h1>Crear publicación</h1>
@stop

@section('content')

    {{-- Formulario para crear post --}}
    <div class="card">
        <div class="card-body">
            {!! Form::open(['route' => 'admin.posts.store', 'autocomplete' => 'off', 'files' => true    ]) !!}

            {{-- ID oculto de usuario actualmente autentificado --}}
            {!! Form::hidden('user_id', auth()->user()->id) !!}

            {{-- Nombre del post --}}
            <div class="form-group">
                {!! Form::label('post_name', 'Nombre:') !!}
                {!! Form::text('post_name', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el nombre de la publicación']) !!}
            
                {{-- error de validacion --}}
                @error('post_name')
                    <small class="text-danger">{{$message}}</small>
                @enderror

            </div>

            {{-- Slug del post --}}
            <div class="form-group">
                {!! Form::label('post_slug', 'Slug:') !!}
                {!! Form::text('post_slug', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el slug de la publicación', 'readonly']) !!}

                {{-- error de validacion --}}
                @error('post_slug')
                    <small class="text-danger">{{$message}}</small>
                @enderror
                
            </div>

            {{-- Campo categorias --}}
            <div class="form-group">
                {!! Form::label('cat_id', 'Categoría')!!}
                {!! Form::select('cat_id', $categorias, null, ['class' => 'form-control'])!!}

                {{-- error de validacion --}}
                @error('cat_id')
                    <small class="text-danger">{{$message}}</small>
                @enderror

            </div>
            
            {{-- Campo etiquetas --}}
            <div class="form-group">
                <p class="font-weight-bold">Etiquetas</p>

                @foreach ($etiquetas as $etiqueta)

                    <label class="mr-2">
                        {!! Form::checkbox('etiquetas[]', $etiqueta->id, null) !!}
                        {{$etiqueta->etq_name}}
                    </label>
                @endforeach

                {{-- error de validacion --}}
                @error('etiquetas')
                    <br>
                    <small class="text-danger">{{$message}}</small>
                @enderror

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

                {{-- error de validacion --}}
                <br>
                @error('post_status')
                <small class="text-danger">{{$message}}</small>
                @enderror

            </div>

            {{-- Adjuntar imagen --}}
            <div class="row mb-3">
                <div class="col">
                    <div class="image-wrapper">
                        <img id="picture" src="https://images.unsplash.com/photo-1631677210323-066f48f55d53?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80" alt="">
                    </div>
                </div>

                <div class="col">
                    <div class="form-group">
                        {!! Form::label('file', 'Imagen que se mostrará en el post') !!}
                        {!! Form::file('file', ['class' => 'form-control-file', 'accept' => 'image/*']) !!}

                        @error('file')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    

                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sint magni non accusantium distinctio enim cupiditate. Quisquam atque ab, voluptates, quam voluptate, cum culpa praesentium corrupti commodi minus labore dolor dicta.</p>
                </div>
            </div>

            {{-- Campo extracto del post --}}
            <div class="form-group">
                {!! Form::label('post_extract', 'Extracto:') !!}
                {!! Form::textarea('post_extract', null, ['class' => 'form-control']) !!}

                {{-- error de validacion --}}
                @error('post_extract')
                <small class="text-danger">{{$message}}</small>
                @enderror

            </div>

            {{-- Campo body del post --}}
            <div class="form-group">
                {!! Form::label('post_body', 'Cuerpo de la publicación:') !!}
                {!! Form::textarea('post_body', null, ['class' => 'form-control']) !!}

                {{-- error de validacion --}}
                @error('post_body')
                <small class="text-danger">{{$message}}</small>
                @enderror

            </div>
            
            {{-- Boton crear post --}}
            {!! Form::submit('Crear Publicación', ['class' => 'btn btn-primary']) !!}

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
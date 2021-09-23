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
            {{-- Si existe una imagen relacionada para el post, metodo isset si esta definido lo que esta dentro del parentesis --}}
            @isset ($post->imagen)
                <img id="picture" src="{{Storage::url($post->imagen->img_url)}}" alt="">
            @else
                <img id="picture" src="https://images.unsplash.com/photo-1631677210323-066f48f55d53?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80" alt="">
            @endif
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
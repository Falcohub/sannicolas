<div class="form-group">
    {!! Form::label('etq_name', 'Nombre:') !!}
    {!! Form::text('etq_name', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el nombre de la etiqueta ...']) !!}
</div>

{{-- error de validacion --}}
@error('etq_name')
    <small class="text-danger">{{$message}}</small>
@enderror

<div class="form-group">
    {!! Form::label('etq_slug', 'Slug:') !!}
    {!! Form::text('etq_slug', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el slug de la etiqueta ...', 'readonly']) !!}
</div>

{{-- error de validacion --}}
@error('etq_slug')
    <small class="text-danger">{{$message}}</small>
@enderror

{{-- Seleccionar color de la etiqueta  --}}
<div class="form-group">
    {{--ejemplo con html
    <label for="">Color:</label>

    <select name="color" id="" class="form-control">
        <option value="red">Rojo</option>
        <option value="green">Verde</option>
        <option value="blue" selected>Azul</option>
    </select> --}}

    {!! Form::label('color', 'Color:') !!}
    {!! Form::select('etq_color', $color, null, ['class' => 'form-control']) !!}
    
    {{-- error de validacion --}}
    @error('etq_color')
        <small class="text-danger">{{$message}}</small>
    @enderror
</div>
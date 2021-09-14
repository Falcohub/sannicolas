@extends('adminlte::page')

@section('title', 'Panel de administración')

@section('content_header')
    <h1>Listado de publicaciones</h1>
@stop

@section('content')
    @livewire('admin.posts-index')
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
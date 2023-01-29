@extends('adminlte::page')

@section('title', 'Mirar')

@section('content_header')
    <h1>Mirar</h1>
@stop

@section('content')
    <p>Welcome to this beautiful admin panel.</p>
@stop

@section('css')
   <!-- <link rel="stylesheet" href="/css/admin_custom.css">-->
    <link rel="stylesheet" href="{{ URL::asset('css/app.css') }}">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
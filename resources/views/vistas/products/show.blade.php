@extends('adminlte::page')

@section('title', 'Mirar')

@section('content_header')

    <h1 class="text-uppercase ml-5" style="font-family: Arial, Helvetica, sans-serif">{{ $producto->nombre }}</h1>

@stop

@section('content')
    <div class="card ml-5 mr-5">

        <div class="card-body">
            <div class="row">

                <div class="col-md-6 border-right">
                    <div class="w-100 contenedor mb-2" style="background: lightgray;border-radius: 5px; text-align: center;">
                        <span class="span-padre"><span class="span-hijo">Imagen del producto</span></span>
                        <img src="{{ asset($producto->imagen) }}" alt="" style="margin: 0px auto">

                    </div>
                    <div class="row">
                        <div class="col-6">
                            <div class="m-2 bg-warning"
                                style="text-align: center; color:white;font-family: Arial, Helvetica, sans-serif">
                                <strong style="font-size: 40px; margin:0px auto;">{{ $producto->stock }}</strong>
                                <p style="margin:0px auto;">Stock</p>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="m-2 bg-info"
                                style="text-align: center; color:white; font-family: Arial, Helvetica, sans-serif">
                                <strong
                                    style="font-size: 40px; margin:0px auto;">{{ $producto->precios->where('habilitado', true)->first()->precio }}</strong>
                                <p style="margin:0px auto;">Bs c/u</p>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="col-md-6">

                    <div class="w-100 contenedor2 mb-2"
                        style="background: lightgray;border-radius: 5px; text-align: center;">
                        <span class="span-padre"><span class="span-hijo">{{ $producto->tematica->nombre }}</span></span>
                        <img src="{{ asset($producto->tematica->imagen) }}" alt="" style="margin: 0px auto">

                    </div>
                    <div class="w-100 ml-2">
                        <strong class="border-bottom w-100">Descripción</strong>
                        <div class="row mt-2 ml-2 mb-2" style="font-size: 13px">
                            <strong class="col-5">Tipo de Producto:</strong>
                            <p class="col-7">{{ $producto->tipoProducto->tipo }}</p>
                            <strong class="col-5">Contenedor: </strong>
                            <p class="col-7">
                                @if ($producto->contenedor)
                                    Contiene {{ $producto->contenidosPadre->first()->cantidad }}
                                    {{ $producto->contenidosPadre->first()->productoHijo->nombre }}
                                @else
                                    No contiene ningun producto
                                @endif
                            </p>
                            <strong class="col-5">Contenido: </strong>
                            <p class="col-7">{{ $producto->contenido }}</p>
                            <strong class="col-5">Fecha de creación: </strong>
                            <p class="col-7">{{$producto->created_at}}</p>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-12">
                                <div class="m-1"
                                    style="text-align: center; color:white;font-family: Arial, Helvetica, sans-serif">
                                   <a href="" class="btn btn-primary w-100" style="background: #6BBAA7; border: white">INVENTARIO</a>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="m-1"
                                    style="text-align: center; color:white; font-family: Arial, Helvetica, sans-serif">
                                    <a href="javascript:window.history.back(); " class="btn btn-primary w-100" style="background: #585858; border: white">VOLVER</a>
                                </div>
                            </div>

                        </div>
<br><br>
                    </div>

                </div>

            </div>
        </div>
    </div>

@stop

@section('css')
    <!-- <link rel="stylesheet" href="/css/admin_custom.css">-->
    <link rel="stylesheet" href="{{ URL::asset('css/app.css') }}">
    <style>
        .contenedor {
            width: 100%;
            height: 350px;
        }

        .contenedor2 {
            width: 100%;
            height: 200px;
        }

        img {
            object-fit: cover;
            height: 100%;
        }

        .span-padre {
            line-height: normal;
            font-size: 11px;
            display: table-caption;
            margin: 0;
            padding: 0;
            background: #646464;
            color: white;
            font-style: italic;
            text-align: center;
            position: relative;
            height: 0;
            width: 100%
        }

        .span-hijo {
            background: rgba(0, 0, 0, 0.4);
            display: block;
            padding: 3px;
            text-shadow: 0 0 15px white;
        }

        .boton {
            width: 200px;
            height: 50px;
        }
    </style>
@stop

@section('js')
    <script>
        console.log('Hi!');
    </script>
@stop

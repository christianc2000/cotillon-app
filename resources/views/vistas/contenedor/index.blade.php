@extends('adminlte::page')

@section('title', 'Productos')

@section('content_header')
    <h1>LISTA DE CONTENEDORES</h1>
@stop

@section('content')
    <!--MODAL EDITAR PRODUCTO-->
    <div class="modal fade" id="modalEditarProducto" tabindex="-1" aria-labelledby=" exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 id="exampleModalLabel">EDITAR PRODUCTO</h1>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <form id="form-update" method="POST" enctype="multipart/form-data">
                    @method('put')
                    @csrf
                    <div class="modal-body">

                        <x-adminlte-input id="nombre" name="nombre" label="Nombre" required />
                        <x-adminlte-input id="contenido" name="contenido" label="Contenido" required />
                        <div class="row">

                            <div class="col-md-5">
                                <label for="">TIPO PRODUCTO</label>
                                <select name="tipo_producto_id" id="tipop" class="form-control">
                                    @foreach ($tproductos as $tproducto)
                                        <option value={{ $tproducto->id }}>{{ $tproducto->tipo }}</option>
                                    @endforeach
                                </select>

                            </div>
                            <div class="col-md-7">
                                <label for="">PRODUCTO</label>
                                <select class="form-control" id="producto" name="producto_id" id="">

                                    @foreach ($productos as $producto)
                                        <option value={{ $producto->id }}>{{ $producto->nombre }}</option>
                                    @endforeach
                                </select>

                            </div>
                        </div>
                        <x-adminlte-input id="cantidad" name="cantidad" label="Cantidad" type="number" required />
                        <input type="text" name="vista" value="1" style="display:none">
                        <input class="form-control my-2" type="file" id="imagen" name="imagen" accept="image/*">
                        <div class="w-100 contenedor2 mb-2"
                            style="background: lightgray;border-radius: 5px; text-align: center;">
                            <span class="span-padre"><span class="span-hijo">Imagen Previsualizada</span></span>
                            <img id="imagenPrevisualizacion" style=" margin:0px auto;">

                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-success">Guardar</button>

                    </div>
                </form>

            </div>
        </div>
    </div>
    <!--MODAL CREAR PRODUCTO CONTENEDOR-->
    <div class="modal fade" id="modalCrearProductoContenedor" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 id="exampleModalLabel">CREAR PRODUCTO CONTENEDOR</h1>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <form action="{{ route('producto.contenedor.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">

                        <x-adminlte-input id="nombre" name="nombre" label="Nombre" required />
                        <x-adminlte-input id="contenido" name="contenido" label="Contenido" required />
                        <div class="row">
                            <div class="col-md-5">
                                <label for="">TIPO PRODUCTO</label>
                                <select name="tipo_producto_id" id="tipop" class="form-control">
                                    @foreach ($tproductos as $tproducto)
                                        <option value={{ $tproducto->id }}>{{ $tproducto->tipo }}</option>
                                    @endforeach
                                </select>

                            </div>
                            <div class="col-md-7">
                                <label for="">PRODUCTO</label>
                                <select class="form-control" id="productoc" name="id_hijo" id="">

                                    @foreach ($productos as $producto)
                                        <option value={{ $producto->id }}>{{ $producto->nombre }}</option>
                                    @endforeach
                                </select>

                            </div>
                        </div>
                        <x-adminlte-input id="cantidad" name="cantidad" label="Cantidad" type="number" required />
                        <input type="text" name="vista" value="1" style="display:none">
                        <input class="form-control my-2" type="file" id="imagen2" name="imagen" accept="image/*">



                        <div class="w-100 contenedor2 mb-2"
                            style="background: lightgray;border-radius: 5px; text-align: center;">
                            <span class="span-padre"><span class="span-hijo">Imagen Previsualizada</span></span>
                            <img id="imagenPrevisualizacion2" style=" margin:0px auto;">

                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-success">Guardar</button>

                    </div>
                </form>

            </div>
        </div>
    </div>
    <!--INICIO-->
    <div class="card">
        @if (count($errors->all()) > 0)
            <div class="alert alert-danger m-1">
                @foreach ($errors->all() as $error)
                    <small class="font-weight-bold">* {{ $error }}</small>
                    <br>
                @endforeach
            </div>
        @endif
        <div class="card-body" style="width: 100%">
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif

            @if (session('eliminar'))
                <div
                    class="px-2 py-1 font-semibold leading-tight text-red-700 bg-red-100  dark:bg-red-700 dark:text-red-100 rounded">
                    {{ session('eliminar') }}
                </div>
            @endif

            <button type="button" class="btn btn-primary mb-2" style="background: #6BBAA7; border:white"
                data-toggle="modal" data-target="#modalCrearProductoContenedor">
                Crear Producto Contenedor
            </button>

            <table id="contenedores" class="table table-striped" style="width:100%; font-size: 14px;">
                <thead>
                    <tr style="background: #6C648B; color: white">
                        <th style="width: 1O%">ID</th>
                        <th style="width: 20%">CONTENEDOR</th>
                        <th style="width: 1O%">CANTIDAD</th>
                        <th style="width: 20%">PRODUCTO</th>
                        <th style="width: 25%">FOTO</th>
                        <th style="width: 15%">OPCIONES</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach ($contenedores as $contenedor)
                        <tr>
                            <td>{{ $contenedor->id }}</td>
                            <td>{{ $contenedor->nombre }}</td>
                            <td>{{ $contenedor->contenidosPadre->first()->cantidad }}</td>
                            <td>{{ $contenedor->contenidosPadre->first()->productoHijo->nombre }}</td>
                            <td>
                                <div class="contenedor"
                                    style="background: lightgray;border-radius: 5px; text-align: center;">
                                   
                                    <img src="{{asset($contenedor->imagen)}}" style=" margin:0px auto;">

                                </div>
                            </td>
                            <td>
                                <section class="flex-container">
                                    <div class="caja">

                                        <button type="button" class="btn btn-edit" id="{{ $contenedor }}"
                                            data-producto="{{ $contenedor->contenidosPadre->first()->id_hijo }}"
                                            data-toggle="modal" data-target="#modalEditarProducto"
                                            style="background: #FBA100; border: white; width: 100%">

                                            <i class="fa fa-edit fa-1x" style="color:black"></i>
                                        </button>
                                    </div>
                                    <div class="caja">
                                        <a href="{{ route('producto.show', $contenedor->id) }}" class="btn"
                                            style="background: #FBA100; border: white;  width: 100%">
                                            <i class="fa fa-eye fa-1x" style="color:black"></i>
                                        </a>
                                    </div>
                                </section>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>


@stop

@section('css')
    <!-- <link rel="stylesheet" href="/css/admin_custom.css">-->
    <link rel="stylesheet" href="{{ URL::asset('css/app.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/dataTables.bootstrap5.min.css">
    <style>
        .flex-container {
            display: flex;
        }

        .contenedor {
            width: 180px;
            height: 120%;
        }
        .contenedor2 {
            width: 100%;
            height: 300px;
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

        .caja {
            width: 45px;
            height: 30px;
            line-height: 30px;
            text-align: center;
            margin: 5px;
        }

    </style>
@stop

@section('js')
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.1/js/dataTables.bootstrap5.min.js"></script>

    <script>
        $(document).ready(function() {
            console.log('hola mundo');

            $('#contenedores').DataTable({
                language: {
                    lengthMenu: 'Mostrar _MENU_ registros por página',
                    zeroRecords: 'No se encontró nada - lo siento',
                    info: 'Mostrando la página _PAGE_ de _PAGES_',
                    infoEmpty: 'No hay registros disponibles',
                    infoFiltered: '(filtrado de _MAX_ registros totales)',
                    search: "Buscar",
                },
            });

            function buscarId(v, id) {
                console.log(v);
                console.log(id)
                for (let index = 0; index < v.length; index++) {
                    if (v[index]['id'] == id) {
                        console.log('se encontro')
                        return v[index];
                    }
                }
                console.log('no se encontro')
            }
            //RELLENAR CAMPOS DEL MODAL PARA ACTUALIZAR UN PRODUCTO
            $('.btn-edit').click(function() {
                //console.log('click boton modal');
                //$("#modalEditarProducto").modal('show');
                const idp = parseInt($(this).attr('data-producto'));
                console.log('id producto seleccionado', idp);
                let contenedor = JSON.parse($(this).attr('id'));
                console.log(contenedor);
                $("#modalEditarProducto").find('#nombre').val(contenedor['nombre']);
                $("#modalEditarProducto").find('#contenido').val(contenedor['contenido']);
                $("#modalEditarProducto").find('#producto').val(idp);
                $("#modalEditarProducto").find('#cantidad').val(contenedor['contenidos_padre'][0][
                    'cantidad'
                ]);
                $("#modalEditarProducto").find('#tipop').val(contenedor['tipo_producto_id']);
                $("#modalEditarProducto").find('#imagenPrevisualizacion').attr('src', contenedor[
                    'imagen']);
                $('#form-update').attr('action', "{{ url('/contenedor') }}/" + contenedor['id']);

            });
            //PREVIEW DE LA IMAGEN QUE SE CAMBIARÁ ANTES DE ACTUALIZAR EL PRODUCTO
            function filePreview(input) {
                if (input.files && input.files[0]) {
                    console.log('entra al if');
                    var reader = new FileReader();
                    reader.onload = function(e) {
                        //    $('#preview + img').remove();
                        console.log('entra');
                        $('#imagenPrevisualizacion').attr('src', e.target.result);
                    }
                    reader.readAsDataURL(input.files[0]);
                } else {
                    console.log('no entra al if');
                }
            }

            function filePreview2(input) {
                if (input.files && input.files[0]) {
                    console.log('entra al if');
                    var reader = new FileReader();
                    reader.onload = function(e) {
                        //    $('#preview + img').remove();
                        console.log('entra');
                        $('#imagenPrevisualizacion2').attr('src', e.target.result);
                    }
                    reader.readAsDataURL(input.files[0]);
                } else {
                    console.log('no entra al if');
                }
            }
            $("#imagen").change(function() {
                console.log('cambia foto editar');
                filePreview(this);
            });
            $("#imagen2").change(function() {
                console.log('cambia foto crear');
                filePreview2(this);
            });
        });
    </script>

@stop

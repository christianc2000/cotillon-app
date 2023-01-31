@extends('adminlte::page')

@section('title', 'Productos')

@section('content_header')
    <h1>LISTA DE PRODUCTOS</h1>
@stop

@section('content')
    <!-- Modal Precio Producto-->
    <div class="modal fade" id="modalPrecioProducto" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 id="exampleModalLabel">PRECIO PRODUCTO</h1>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <form id="form-precio" method="POST">
                    @csrf
                    <div class="modal-body" id="modal-precio">
                        <div class="row">
                            <div class="col-6">
                                <label for="">Precio Actual</label>
                                <p type="text" class="form-control" id="pactual" name='precioActual'>
                            </div>
                            <div class="col-6">
                                <label for="">Precio Sugerido</label>
                                <p type="text" class="form-control" id="psugerido" name='precioSugerido'>
                            </div>

                        </div>
                        <label for="">Nuevo Precio (Bs)</label>
                        <input type="number" min="1" step="any" class="form-control" name="precio">
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

                        <input class="form-control my-2 imagen" type="file" capture="camera" id="imagen"
                            name="imagen" accept="image/*">


                        <div class="w-100 contenedor mb-2"
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
    <!-- Modal Editar Producto-->
    <div class="modal fade" id="modalEditarProducto" tabindex="-1" aria-labelledby=" exampleModalLabel"
        aria-hidden="true">
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
                                <label for="">TEMATICA</label>
                                <select id="tematica" name="tematica_id" class="form-control">
                                    @foreach ($tematicas as $tematica)
                                        <option value={{ $tematica->id }}>{{ $tematica->nombre }}</option>
                                    @endforeach
                                </select>

                            </div>
                            <div class="col-md-7">
                                <label for="">TIPO PRODUCTO</label>
                                <select class="form-control" id="tipop" name="tipo_producto_id">

                                    @foreach ($tproductos as $tproducto)
                                        <option value={{ $tproducto->id }}>{{ $tproducto->tipo }}</option>
                                    @endforeach
                                </select>

                            </div>
                        </div>

                        <input class="form-control my-2 imagen" type="file" capture="camera" id="imagen"
                            name="imagen" accept="image/*">


                        <div class="w-100 contenedor mb-2"
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
                <div class="alert alert-danger">
                    {{ session('eliminar') }}
                </div>
            @endif
            <button type="button" class="btn btn-primary mb-2" style="background: #6BBAA7; border:white"
                data-toggle="modal" data-target="#modalCrearProducto">
                Crear Producto
            </button>
            <button type="button" class="btn btn-primary mb-2" style="background: #6BBAA7; border:white"
                data-toggle="modal" data-target="#modalCrearProductoContenedor">
                Crear Producto Contenedor
            </button>
            <div class="m-2">
                <table id="productos" class="table table-striped" style="width:100%; font-size: 14px;">
                    <thead>
                        <tr style="background: #6C648B; color: white">
                            <th style="width: 5%">ID</th>
                            <th style="width: 15%">PRODUCTO</th>
                            <th style="width: 7%">STOCK</th>
                            <th style="width: 15%">TEMÁTICA</th>
                            <th style="width: 8%">PRECIO(Bs)</th>
                            <th style="width: 25%">FOTO</th>
                            <th style="width: 25%">OPCIONES</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($productos as $producto)
                            <tr>
                                <td>{{ $producto->id }}</td>
                                <td>{{ $producto->nombre }}</td>
                                <td>
                                    {{ $producto->stock }}
                                </td>
                                <td>{{ $producto->tematica->nombre }}</td>
                                <td>
                                    {{ $producto->precios->where('habilitado', true)->first()->precio }}
                                </td>
                                <td>
                                    <div class="contenedor2"
                                        style="background: lightgray;border-radius: 5px; text-align: center;">

                                        <img src="{{ asset($producto->imagen) }}" style=" margin:0px auto;">

                                    </div>
                                </td>
                                <td>
                                    <section class="flex-container">
                                        <div class="caja">

                                            <button type="button" class="btn btn-edit" id="{{ $producto->id }}"
                                                data-toggle="modal" data-target="#modalEditarProducto"
                                                style="background: #FBA100; border: white; width: 100%">

                                                <i class="fa fa-edit fa-1x" style="color:black"></i>
                                            </button>
                                        </div>
                                        <div class="caja">
                                            <a href="{{ route('producto.show', $producto->id) }}" class="btn"
                                                style="background: #FBA100; border: white;  width: 100%">
                                                <i class="fa fa-eye fa-1x" style="color:black"></i>
                                            </a>
                                        </div>
                                        <div class="caja">
                                            <button type="button" class="btn btn-precio" id="{{ $producto->id }}"
                                                data-precio="{{ $producto->precios->where('habilitado', true)->first() }}"
                                                data-toggle="modal" data-target="#modalPrecioProducto"
                                                style="background: #FBA100; border: white; width: 100%">
                                                <i class="fa fa-dollar-sign fa-1x" style="color:black"></i>
                                            </button>
                                        </div>
                                    </section>
                                    <section class="flex-container">
                                        <div class="caja">
                                            <a href="" class="btn"
                                                style="background: #FBA100; border: white; width:100%">
                                                <i class="fa fa-luggage-cart" style="color:black"></i>
                                            </a>
                                        </div>
                                        <div class="caja">
                                            <form action="{{ route('producto.destroy', $producto->id) }}" method="post">
                                                @csrf
                                                @method('delete')
                                                <button type="submit" class="btn"
                                                    style="background: #FBA100; border: white; width: 100%">
                                                    <i class="fa fa-trash" style="color:black"></i>
                                                </button>
                                            </form>

                                        </div>
                                    </section>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

        </div>
    </div>

    <!-- Button trigger modal -->

    <!-- Modal CREAR PRODUCTO -->
    <div class="modal fade" id="modalCrearProducto" tabindex="-1" aria-labelledby=" exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 id="exampleModalLabel">CREAR PRODUCTO</h1>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <form action="{{ route('producto.store') }}" method="POST" enctype="multipart/form-data">

                    @csrf
                    <div class="modal-body">

                        <x-adminlte-input id="nombre" name="nombre" label="Nombre" required />
                        <x-adminlte-input id="contenido" name="contenido" label="Contenido" required />
                        <div class="row">
                            <div class="col-md-5">
                                <label for="">TEMATICA</label>
                                <select id="tematica" name="tematica_id" class="form-control">
                                    @foreach ($tematicas as $tematica)
                                        <option value={{ $tematica->id }}>{{ $tematica->nombre }}</option>
                                    @endforeach
                                </select>

                            </div>
                            <div class="col-md-7">
                                <label for="">TIPO PRODUCTO</label>
                                <select class="form-control" id="tipop" name="tipo_producto_id">

                                    @foreach ($tproductos as $tproducto)
                                        <option value={{ $tproducto->id }}>{{ $tproducto->tipo }}</option>
                                    @endforeach
                                </select>

                            </div>
                        </div>
                        <input class="form-control my-2 imagen" type="file" capture="camera" id="imagen"
                            name="imagen" accept="image/*">


                        <div class="w-100 contenedor mb-2"
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
    <!-- Modal EDITAR PRODUCTO-->
    <!-- Modal -->


@stop

@section('css')
    <!-- <link rel="stylesheet" href="/css/admin_custom.css">-->
    <link rel="stylesheet" href="{{ URL::asset('css/app.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css">
    <style>
        .contenedor {
            width: 300px;
            height: 300px;

        }

        .contenedor2 {
            width: 180px;
            height: 100%;

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

        .flex-container {
            display: flex;
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
            $('#productos').DataTable({
                language: {
                    lengthMenu: 'Mostrar _MENU_ registros por página',
                    zeroRecords: 'No se encontró nada - lo siento',
                    info: 'Mostrando la página _PAGE_ de _PAGES_',
                    infoEmpty: 'No hay registros disponibles',
                    infoFiltered: '(filtrado de _MAX_ registros totales)',
                    search: "Buscar",
                },
                //  responsive: true
                //  scrollY: '280px',
                //  scrollCollapse: false,

            });

            console.log("hola mundo");
            //realizar función buscar por id
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

            function contenedoresproducto(v, cp) {
                let cps = [];
                for (let i = 0; i < cp.length; i++) {
                    const e = cp[i];
                    //   console.log('dentro de la funcion')
                    // console.log(e);
                    let p = buscarId(v, e['contenedor_id']);
                    cps.push(p);
                }
                console.log(cps);
                return cps;
            }

            //PREVIEW DE LA IMAGEN QUE SE CAMBIARÁ ANTES DE ACTUALIZAR EL PRODUCTO
            function filePreview(input) {
                if (input.files && input.files[0]) {
                    console.log('entra al if');
                    var reader = new FileReader();
                    reader.onload = function(e) {
                        //    $('#preview + img').remove();
                        console.log('entra');
                        padre = $(input).parent();
                        $(padre).find('#imagenPrevisualizacion').attr('src', e.target.result);
                    }
                    reader.readAsDataURL(input.files[0]);
                } else {
                    console.log('no entra al if');
                }
            }
            $(".imagen").change(function() {
                console.log('cambia foto');

                console.log($(this).parent());
                filePreview(this);
            });
            //RELLENAR CAMPOS DEL MODAL PARA ACTUALIZAR UN PRODUCTO
            $('.btn-edit').click(function() {
                //console.log('click boton modal');
                //$("#modalEditarProducto").modal('show');
                const id = parseInt($(this).attr('id'));
                const p = {!! json_encode($productos->all()) !!};
                const pr = buscarId(p, id);
                console.log('abriendo modal');
                $("#modalEditarProducto").find('#nombre').val(pr['nombre']);
                $("#modalEditarProducto").find('#contenido').val(pr['contenido']);
                $("#modalEditarProducto").find('#tematica').val(pr['tematica_id']);
                $("#modalEditarProducto").find('#tipop').val(pr['tipo_producto_id']);
                $("#modalEditarProducto").find('#imagenPrevisualizacion').attr('src', pr[
                    'imagen']);
                $('#form-update').attr('action', "{{ url('/producto') }}/" + pr['id']);
                console.log('llena modal');
                //  $('#modalEditarProducto').find()
            });
            //MODAL PRECIO
            $('.btn-precio').click(function() {
                const id = parseInt($(this).attr('id'));

                let precio = JSON.parse($(this).attr(
                    'data-precio')); //PRECIOS DEL CONTENEDOR PRODUCTO
                console.log(precio);
                //precio actual
                $('#pactual').text(precio['precio']);
                //precio sugerido
                $('#psugerido').text(0); //falta completar precio sugerido
                //  $('#modal-precio').append(texto);
                $('#form-precio').attr('action', "{{ url('/producto') }}/" + id + "/precio");
            });
        });
    </script>
@stop

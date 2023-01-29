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
                <form id="form-update" method="POST">
                    @csrf
                    <div class="modal-body" id="modal-precio">
                        <x-adminlte-select id="scontenedores" name="contenedor_producto_id" label="CONTENEDORES"
                            label-class="text-lightblue" igroup-size="lg" style="text-size:10px">
                            <x-slot name="prependSlot">
                                <div class="input-group-text bg-gradient-info">
                                    <i class="fa fa-solid fa-calendar"></i>
                                </div>
                            </x-slot>
                            <!--  <button class="btn btn-success" type="submit">OK</button>-->
                        </x-adminlte-select>
                        <div class="row">
                            <div class="col-4">
                                <label  for="">Precio Actual</label>
                                <p type="text" class="form-control" id="pactual" name='precioActual'>
                            </div>
                            <div class="col-4">
                                <label  for="">Precio Anterior</label>
                                <p type="text" class="form-control" id="panterior" name='precioAnterior'>
                            </div>
                            <div class="col-4">
                                <label  for="">Precio Sugerido</label>
                                <p type="text" class="form-control" id="psugerido" name='precioSugerido'>
                            </div>
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
    <div class="modal fade" id="modalEditarProducto" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                            <div class="col-md-6">
                                <x-adminlte-select id="tematica" name="tematica_id" label="TEMATICA"
                                    label-class="text-lightblue" igroup-size="lg" style="text-size:10px">
                                    <x-slot name="prependSlot">
                                        <div class="input-group-text bg-gradient-info">
                                            <i class="fa fa-solid fa-calendar"></i>
                                        </div>
                                    </x-slot>
                                    @foreach ($tematicas as $tematica)
                                        <option value={{ $tematica->id }}>{{ $tematica->nombre }}</option>
                                    @endforeach
                                    <!--  <button class="btn btn-success" type="submit">OK</button>-->
                                </x-adminlte-select>
                            </div>
                            <div class="col-md-6">
                                <x-adminlte-select id="tipop" name="tipo_producto_id" label="TIPO PRODUCTO"
                                    label-class="text-lightblue" igroup-size="lg">
                                    <x-slot name="prependSlot">
                                        <div class="input-group-text bg-gradient-info">
                                            <i class="fa fa-solid fa-calendar"></i>
                                        </div>
                                    </x-slot>
                                    @foreach ($tproductos as $tproducto)
                                        <option value={{ $tproducto->id }}>{{ $tproducto->tipo }}</option>
                                    @endforeach
                                    <!--  <button class="btn btn-success" type="submit">OK</button>-->
                                </x-adminlte-select>
                            </div>
                        </div>
                        <input class="form-control my-2" type="file" id="imagen" name="imagen" accept="image/*">
                        <div class="contenedor" id="preview"
                            style=" background: #D9D9D9; border: solid 3px #6C648B; text-align:center;">
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
                data-toggle="modal" data-target="#modalCrearProducto">
                Crear Producto
            </button>
            <table id="productos" class="table table-striped" style="width:100%; font-size: 14px;">
                <thead>
                    <tr style="background: #6C648B; color: white">
                        <th style="width: 15%">PRODUCTO</th>
                        <th style="width: 13%">CONTENIDO</th>
                        <th style="width: 8%">STOCK</th>
                        <th style="width: 15%">TEMÁTICA</th>
                        <th style="width: 8%">PRECIO(Bs)</th>
                        <th style="width: 15%">FOTO</th>
                        <th style="width: 15%">OPCIONES</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach ($productos as $producto)
                        <tr>
                            <td>{{ $producto->nombre }}</td>
                            <td>{{ $producto->contenido }}</td>
                            <td>
                                {{ $producto->stock }}
                            </td>
                            <td>{{ $producto->tematica->nombre }}</td>
                            <td>
                                @if (count($producto->precios) > 0)
                                    {{ $producto->precios->where('habilitado', true)->first()->precio }}
                                @else
                                    0
                                @endif
                            </td>
                            <td>
                                <div style="align-items: center; height: 100px;width: 90%">
                                    <img src={{ asset($producto->imagen) }} alt="" style="border-radius: 5px;">
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
                                        <a href="" class="btn"
                                            style="background: #FBA100; border: white;  width: 100%">
                                            <i class="fa fa-eye fa-1x" style="color:black"></i>
                                        </a>
                                    </div>
                                    <div class="caja">
                                        <button type="button" class="btn btn-precio" id="{{ $producto->id }}"
                                            data-contenedores="{{ $producto->contenedorProductos }}"
                                            data-precio="{{ $producto->precios }}" data-toggle="modal"
                                            data-target="#modalPrecioProducto"
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
                                        <a href="" class="btn"
                                            style="background: #FBA100; border: white; width: 100%">
                                            <i class="fa fa-trash" style="color:black"></i>
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

    <!-- Button trigger modal -->

    <!-- Modal CREAR PRODUCTO -->
    <div class="modal fade" id="modalCrearProducto" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 id="exampleModalLabel">CREAR PRODUCTO</h1>
                        <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('producto.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <x-adminlte-input name="nombre" label="Nombre" required />
                        <x-adminlte-input name="contenido" label="Contenido" required />
                        <div class="row">
                            <div class="col-md-6">
                                <x-adminlte-select name="tematica_id" label="TEMATICA" label-class="text-lightblue"
                                    igroup-size="lg">
                                    <x-slot name="prependSlot">
                                        <div class="input-group-text bg-gradient-info">
                                            <i class="fa fa-solid fa-calendar"></i>
                                        </div>
                                    </x-slot>
                                    @foreach ($tematicas as $tematica)
                                        <option value={{ $tematica->id }}>{{ $tematica->nombre }}</option>
                                    @endforeach
                                    <!--  <button class="btn btn-success" type="submit">OK</button>-->
                                </x-adminlte-select>
                            </div>
                            <div class="col-md-6">
                                <x-adminlte-select name="tipo_producto_id" label="TIPO PRODUCTO"
                                    label-class="text-lightblue" igroup-size="lg">
                                    <x-slot name="prependSlot">
                                        <div class="input-group-text bg-gradient-info">
                                            <i class="fa fa-solid fa-calendar"></i>
                                        </div>
                                    </x-slot>
                                    @foreach ($tproductos as $tproducto)
                                        <option value={{ $tproducto->id }}>{{ $tproducto->tipo }}</option>
                                    @endforeach
                                    <!--  <button class="btn btn-success" type="submit">OK</button>-->
                                </x-adminlte-select>
                            </div>
                        </div>
                        <input class="form-control my-2" type="file" id="foto" name="imagen" accept="image/*">
                        <div class="contenedor"
                            style="background: #D9D9D9; border: solid 3px #6C648B; text-align: center">
                            <img id="imagenPrevisualizacion" style=" margin:0px auto;">
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                            <button type="submit" class="btn btn-success">Guardar</button>
                    </form>
                </div>
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
    <link rel="stylesheet" href=" https://cdn.datatables.net/1.13.1/css/dataTables.bootstrap5.min.css">
    <style>
        .contenedor {
            width: 300px;
            height: 300px;

        }

        img {

            object-fit: cover;
            height: 100%;
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
        });
    </script>
    <script>
        $(document).ready(function() {
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
            //MODAL PRECIO
            $('.btn-precio').click(function() {
                const id = parseInt($(this).attr('id'));
                let p = @json($productos->all()); //TODOS LOS PRODUCTOS
                let producto = buscarId(p, id); //PRODUCTO
                let precios = JSON.parse($(this).attr('data-precio')); //PRECIOS DEL CONTENEDOR PRODUCTO
                let contenedoresp = JSON.parse($(this).attr(
                    'data-contenedores')); //TABLA INTERMEDIA CONTENEDOR PRODUCTO
                let contenedores = @json($contenedors->all()); //NO LO USARE
                let cps = contenedoresproducto(contenedores,
                contenedoresp); //nombres de los contenedores del producto
                //construir en el DOM
                $select = $('#scontenedores');
                $select.empty();
                $select.append($("<option>", {
                    value: 0,
                    text: 'Unitario'
                }));
                for (let i = 0; i < cps.length; i++) {
                    const element = cps[i];
                    $select.append($("<option>", {
                        value: element['id'],
                        text: element['nombre']
                    }));
                }
//precio actual
$('#pactual').text(1);
//precio anterior
$('#panterior').text(2);
//precio sugerido
$('#psugerido').text(3)
                //  $('#modal-precio').append(texto);


                console.log(producto);
                console.log(precios);
                console.log('contenedores producto');
                console.log(cps);
            });
            //PREVIEW DE LA IMAGEN QUE SE CAMBIARÁ ANTES DE ACTUALIZAR EL PRODUCTO
            function filePreview(input) {
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
                console.log('cambia foto');
                filePreview(this);
            });
            //RELLENAR CAMPOS DEL MODAL PARA ACTUALIZAR UN PRODUCTO
            $('.btn-edit').click(function() {
                //console.log('click boton modal');
                //$("#modalEditarProducto").modal('show');
                const id = parseInt($(this).attr('id'));
                const p = {!! json_encode($productos->all()) !!};
                const pr = p[id - 1];
                console.log('abriendo modal');
                $("#modalEditarProducto").find('#nombre').val(pr['nombre']);
                $("#modalEditarProducto").find('#contenido').val(pr['contenido']);
                $("#modalEditarProducto").find('#tematica').val(pr['tematica_id']);
                $("#modalEditarProducto").find('#tipop').val(pr['tipo_producto_id']);
                $("#modalEditarProducto").find('#imagenPrevisualizacion2').attr('src', pr['imagen']);
                $('#form-update').attr('action', "{{ url('/producto') }}/" + pr['id']);
                //  $('#modalEditarProducto').find()
            });

            //cloudinary.url().transformation(new Transformation().quality(60)).imageTag(url);

            // Obtener referencia al input y a la imagen

            const $seleccionArchivos = document.querySelector("#foto"),
                $imagenPrevisualizacion = document.querySelector("#imagenPrevisualizacion");

            // Escuchar cuando cambie
            $seleccionArchivos.addEventListener("change", () => {
                // Los archivos seleccionados, pueden ser muchos o uno
                const archivos = $seleccionArchivos.files;
                // Si no hay archivos salimos de la función y quitamos la imagen
                if (!archivos || !archivos.length) {
                    $imagenPrevisualizacion.src = "";
                    return;
                }
                // Ahora tomamos el primer archivo, el cual vamos a previsualizar
                const primerArchivo = archivos[0];
                // Lo convertimos a un objeto de tipo objectURL
                const objectURL = URL.createObjectURL(primerArchivo);
                // Y a la fuente de la imagen le ponemos el objectURL
                $imagenPrevisualizacion.src = objectURL;
                // $('#imagenPrevisualizacion').width(300);
            });
        });
    </script>
@stop

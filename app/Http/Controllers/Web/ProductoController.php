<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Precio;
use App\Models\Producto;
use App\Models\Tematica;
use App\Models\TipoProducto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductoController extends Controller
{
    public function index()
    {
        $productos = Producto::all();
        $tematicas = Tematica::all();
        $tproductos = TipoProducto::all();
        return view('vistas.products.index', compact('productos', 'tematicas', 'tproductos'));
    }
    public function store(Request $request)
    {

        $request->validate([
            'nombre' => 'required|string',
            'contenido' => 'required|string',
            'tematica_id' => 'required',
            'imagen' => 'required|image|mimes:jpg,jpeg,bmp,png|max:2048',
            'tipo_producto_id' => 'required',
        ]);
        if ($request->hasFile('imagen')) {
            //     $url = Storage::put('Productos', $request->file('imagen'));
            $file = $request->file('imagen');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . "." . $extension;
            $file->move('Productos/', $filename);
            $url = 'Productos/' . $filename;
            Producto::create([
                'nombre' => $request->nombre,
                'contenido' => $request->contenido,
                'tematica_id' => $request->tematica_id,
                'imagen' => $url,
                'stock' => 0,
                'tipo_producto_id' => $request->tipo_producto_id,
            ]);

            session()->flash('status', '¡Tipo de servicio creado exitosamente!');
        }
        return redirect()->route('producto.index');
    }
    public function edit($id)
    {
    }
    public function update(Request $request, $id)
    {
    }
    public function show($id)
    {
    }
    public function destroy($id)
    {
    }
}

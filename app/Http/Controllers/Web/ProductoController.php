<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Contenedor;
use App\Models\Contenido;
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
        // return $productos;
        $tematicas = Tematica::all();
        $tproductos = TipoProducto::all();
        // $contenedors=Contenedor::all();
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
            $producto = Producto::create([
                'nombre' => $request->nombre,
                'contenido' => $request->contenido,
                'tematica_id' => $request->tematica_id,
                'imagen' => $url,
                'contenedor' => false,
                'stock' => 0,
                'tipo_producto_id' => $request->tipo_producto_id,
            ]);
            Precio::create([
                'precio' => 0,
                'fecha_finalizado' => null,
                'habilitado' => true,
                'producto_id' => $producto->id
            ]);
            session()->flash('status', '¡Producto creado exitosamente!');
        }
        return redirect()->route('producto.index');
    }
    public function edit($id)
    {
    }
    public function update(Request $request, $id)
    {
        //  return $request;
        $request->validate([
            'nombre' => 'required|string',
            'contenido' => 'required|string',
            'tematica_id' => 'required',
            'imagen' => 'image|mimes:jpg,jpeg,bmp,png|max:2048',
            'tipo_producto_id' => 'required',
        ]);
        $p = Producto::find($id);
        // return $p;
        if ($request->has('imagen')) {
            $file = $request->file('imagen');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . "." . $extension;
            $file->move('Productos/', $filename);
            $url = 'Productos/' . $filename;
            //  return 'ingresa';
            $p->update([
                'nombre' => $request->nombre,
                'imagen' => $url,
                'contenido' => $request->contenido,
                'tematica_id' => $request->tematica_id,
                'tipo_producto_id' => $request->tipo_producto_id
            ]);
        } else {
            // return "no ingresa";
            $p->update([
                'nombre' => $request->nombre,
                'contenido' => $request->contenido,
                'tematica_id' => $request->tematica_id,
                'tipo_producto_id' => $request->tipo_producto_id
            ]);
        }
        session()->flash('status', '¡Producto actualizado exitosamente!');
        return redirect()->route('producto.index');
    }
    public function show($id)
    {
        $producto = Producto::findOrFail($id);
        return view('vistas.products.show', compact('producto'));
    }

    public function storeContenedor(Request $request)
    {
        
        $request->validate([
            'nombre' => 'required|string',
            'contenido' => 'required|string',
            'tipo_producto_id' => 'required',
            'id_hijo' => 'required',
            'cantidad' => 'required',
            'imagen' => 'image|mimes:jpg,jpeg,bmp,png|max:2048',
        ]);
        if ($request->hasFile('imagen')) {
            //     $url = Storage::put('Productos', $request->file('imagen'));
            $file = $request->file('imagen');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . "." . $extension;
            $file->move('Productos/', $filename);
            $url = 'Productos/' . $filename;
            $p = Producto::findOrFail($request->id_hijo);
            $producto = Producto::create([
                'nombre' => $request->nombre,
                'contenido' => $request->contenido,
                'tematica_id' => $p->tematica_id,
                'imagen' => $url,
                'contenedor' => true,
                'stock' => 0,
                'tipo_producto_id' => $request->tipo_producto_id,
            ]);
            Precio::create([
                'precio' => 0,
                'fecha_finalizado' => null,
                'habilitado' => true,
                'producto_id' => $producto->id
            ]);
            Contenido::create([
                'cantidad' => $request->cantidad,
                'id_padre' => $producto->id,
                'id_hijo' => $p->id
            ]);
         
            if(isset($request->vista)){
                session()->flash('status', '¡Contenedor creado exitosamente!');
               return redirect()->route('contenedor.index');
            }else{
                session()->flash('status', '¡Producto creado exitosamente!');
                return redirect()->route('producto.index');
            }
           
        }
        
    }
    public function destroy($id)
    {
        $producto=Producto::findOrFail($id);
        $producto->delete();
        session()->flash('eliminar', '¡Producto eliminado exitosamente!');
        return redirect()->route('producto.index');
    }
}

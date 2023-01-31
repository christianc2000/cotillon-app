<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Contenido;
use App\Models\Producto;
use App\Models\TipoProducto;
use Illuminate\Http\Request;

class ContenedorController extends Controller
{
    public function index()
    {
        $contenedores = Producto::all()->where('contenedor', true);
        $productos = Producto::all()->where('contenedor', false);
        $tproductos = TipoProducto::all();
        return view('vistas.contenedor.index', compact('contenedores', 'productos', 'tproductos'));
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre' => 'required|string',
            'contenido' => 'required|string',
            'producto_id' => 'required',
            'imagen' => 'image|mimes:jpg,jpeg,bmp,png|max:2048',
            'tipo_producto_id' => 'required',
        ]);

        //return "entra al controlador contenedor";
        $p = Producto::find($id);
        $ph=Producto::find($request->producto_id);
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
                'tematica_id'=>$ph->tematica_id,
                'tipo_producto_id' => $request->tipo_producto_id
            ]);
            $c = Contenido::find($p->contenidosPadre()->first()->id);
            $c->cantidad = $request->cantidad;
            $c->id_hijo = $request->producto_id;
            $c->save();
        } else {
            // return "no ingresa";
            $p->update([
                'nombre' => $request->nombre,
                'contenido' => $request->contenido,
                'tematica_id'=>$ph->tematica_id,
                'tipo_producto_id' => $request->tipo_producto_id
            ]);
            $c = Contenido::find($p->contenidosPadre()->first()->id);
            $c->cantidad = $request->cantidad;
            $c->id_hijo = $request->producto_id;
            $c->save();
        }
        if (isset($request->vista)) {
            session()->flash('status', '¡Contenedor actualizado exitosamente!');
            return redirect()->route('contenedor.index');
        } else {
            session()->flash('status', '¡Producto actualizado exitosamente!');
            return redirect()->route('producto.index');
        }
        session()->flash('status', '¡Producto actualizado exitosamente!');
        return redirect()->route('producto.index');
    }
}

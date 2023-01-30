<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Precio;
use App\Models\Producto;
use Illuminate\Http\Request;

class PrecioController extends Controller
{

    public function storePrecioProducto(Request $request, $id)
    {
        $producto = Producto::find($id);
        //return $id;
        if (isset($producto)) {
            $request->validate([
                'precio' => 'required'
            ]);
            //deshabilitar el ultimo precio
            $precio = Precio::find($producto->precios->where('habilitado', true)->first()->id);
            if (isset($precio)) {
                $precio->habilitado = false;
                $precio->fecha_finalizado = now();
                $precio->save();
            }
            Precio::create([
                'precio' => $request->precio,
                'fecha_finalizado' => null,
                'habilitado' => true,
                'producto_id' => $id
            ]);
        }
        session()->flash('status', '¡PRECIO INTRODUCIDO CORRECTAMENTE!');
        return redirect()->route('producto.index');
    }
}

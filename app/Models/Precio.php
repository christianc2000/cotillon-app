<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Precio extends Model
{
    use HasFactory;
    protected $fillable = [
        'precio',
        'fecha_finalizado',
        'habilitado',
        'tipoPrecio',
        'producto_id',
        'contenedor_producto_id'
    ];
    //relación de 1 a mucho inversa
    public function contenedorProducto(){
        return $this->belongsTo(ContenedorProducto::class);
    }
    public function producto(){
        return $this->belongsTo(Producto::class);
    }
}

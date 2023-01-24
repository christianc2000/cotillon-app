<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContenedorProducto extends Model
{
    use HasFactory;
    protected $fillable = [
        'cantidadProducto',
        'producto_id',
        'contenedor_id'
    ];
    //relación de 1 a muchos
    public function precios(){
        return $this->hasMany(Precio::class);
    }
    //relación de 1 a mucho inversa
    public function contenedor(){
        return $this->belongsTo(Contenedor::class);
    }
    public function producto(){
        return $this->belongsTo(Producto::class);
    }
}

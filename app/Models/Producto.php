<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;
    protected $fillable = [
        'nombre',
        'imagen',
        'contenido',
        'stock',
        'tematica_id',
        'tipo_producto_id'
    ];
    //Relación de 1 a muchos
    public function vencimientos(){
        return $this->hasMany(Vencimiento::class);
    }
    public function ubicacionProductos(){
        return $this->hasMany(UbicacionProducto::class);
    }
    public function precios(){
        return $this->hasMany(Precio::class);
    }
    public function contenedorProductos(){
        return $this->hasMany(ContenedorProducto::class);
    }
    //Relación de 1 a mucho inversa
    public function tematica(){
        return $this->belongsTo(Tematica::class);
    }
    public function tipoProducto(){
        return $this->belongsTo(TipoProducto::class);
    }
}

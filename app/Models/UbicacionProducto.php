<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UbicacionProducto extends Model
{
    use HasFactory;
    protected $fillable=[
        'cantidadUnitario',
      //  'tipoUbicacion',
        'producto_id',
        'ubicacion_id'
    ];
    //relación de 1 a muchos inversa
    public function ubicacion(){
        return  $this->belongsTo(Ubicacion::class);
    }
    public function producto(){
        return  $this->belongsTo(Producto::class);
    }
}

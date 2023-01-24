<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contenedor extends Model
{
    use HasFactory;
    protected $fillable=[
        'nombre',
        'descripcion'
    ];
    //relación de 1 a muchos
    public function contenedorProductos(){
        return $this->hasMany(ContenedorProducto::class);
    }
}

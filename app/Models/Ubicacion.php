<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ubicacion extends Model
{
    use HasFactory;
    protected $fillable=[
        'codigo',
        'ubicacion',
        'tipoUbicacion'
    ];
    //relación de 1 a muchos
    public function ubicacionProductos(){
        return $this->hasMany(UbicacionProducto::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tematica extends Model
{
    use HasFactory;
    protected $fillable=[
        'nombre',
        'ubicacion'
    ];

    //relacion de 1 a muchos
     public function productos(){
        return $this->hasMany(Producto::class);
     }
    //relación de 1 a mucho inversa
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contenido extends Model
{
    use HasFactory;
    protected $fillable = [
        'cantidad',
        'id_padre',
        'id_hijo'
    ];
    public function productoPadre(){
        return $this->belongsTo(Producto::class, 'id_padre', 'id');
    }
    public function productoHijo(){
        return $this->belongsTo(Producto::class,'id_hijo', 'id');
    }

}

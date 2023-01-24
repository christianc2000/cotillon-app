<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vencimiento extends Model
{
    use HasFactory;
    protected $fillable = [
        'codigo',
        'cantidad',
        'fechaVencimiento',
        'vencido',
        'cantidadVencido',
        'stock',
        'producto_id'
    ];
    //relación de 1 a muchos inversa
    public function producto(){
        return $this->belongsTo(Producto::class);
    }
}

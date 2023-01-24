<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoProducto extends Model
{
    use HasFactory;
    protected $fillable=['tipo'];

    //relación de 1 a muchos
    public function productos(){
        return $this->hasMany(Producto::class);
    }
}

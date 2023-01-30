<?php

namespace Database\Seeders;

use App\Models\Producto;
use Illuminate\Database\Seeder;

class ProductoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $productos=[
            [
                'nombre'=>'Canasta carton de Capitan america',
                'imagen'=>'https://http2.mlstatic.com/D_NQ_NP_848224-MLA29006769675_122018-V.jpg',
                'contenido'=>'10 unidades',
                'contenedor'=>false,
                'stock'=>44,
                'tematica_id'=>4,
                'tipo_producto_id'=>2
            ],
            [
                'nombre'=>'Caja canasta de Capitan america',
                'imagen'=>'https://http2.mlstatic.com/D_NQ_NP_848224-MLA29006769675_122018-V.jpg',
                'contenido'=>'28 unidades',
                'contenedor'=>true,
                'stock'=>2,
                'tematica_id'=>4,
                'tipo_producto_id'=>2
            ],
            [
                'nombre'=>'Canasta carton de Sonic',
                'imagen'=>'https://i.ytimg.com/vi/udAOFgM-FKI/maxresdefault.jpg',
                'contenido'=>'10 unidad',
                'contenedor'=>false,
                'stock'=>5,
                'tematica_id'=>3,
                'tipo_producto_id'=>2
            ],
            [
                'nombre'=>'Piñata carton de Sonic',
                'imagen'=>'https://i.ytimg.com/vi/udAOFgM-FKI/maxresdefault.jpg',
                'contenido'=>'1 unidad',
                'contenedor'=>false,
                'stock'=>10,
                'tematica_id'=>3,
                'tipo_producto_id'=>3
            ],
            [
                'nombre'=>'Sombrero cumpleañero de Frozen',
                'imagen'=>'https://i.pinimg.com/originals/2c/34/e4/2c34e446c9adec6bb7dd634a23f3865d.jpg',
                'contenido'=>'1 unidad',
                'contenedor'=>false,
                'stock'=>10,
                'tematica_id'=>2,
                'tipo_producto_id'=>4
            ],
        ];
        foreach ($productos as $p) {
            Producto::create($p);
        }
    }
}

<?php

namespace Database\Seeders;

use App\Models\ContenedorProducto;
use Illuminate\Database\Seeder;

class ContenedorProductoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $contenedorProductos = [
            [
                'cantidadProducto' => 50,
                'producto_id' => 1,
                'contenedor_id' => 2
            ],
            [
                'cantidadProducto' => 50,
                'producto_id' => 1,
                'contenedor_id' => 3
            ],
            [
                'cantidadProducto' => 15,
                'producto_id' => 2,
                'contenedor_id' => 3
            ]
        ];
        foreach ($contenedorProductos as $cp) {
            ContenedorProducto::create($cp);
        }
    }
}

<?php

namespace Database\Seeders;

use App\Models\Ubicacion;
use App\Models\UbicacionProducto;
use Illuminate\Database\Seeder;

class UbicacionProductoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $ubicacionproductos = [
            [
                'cantidadUnitario' => 6,
                'producto_id' => 1,
                'ubicacion_id' => 1
            ],
            [
                'cantidadUnitario' => 2,
                'producto_id' => 2,
                'ubicacion_id' => 2
            ],
            [
                'cantidadUnitario' => 3,
                'producto_id' => 3,
                'ubicacion_id' => 3
            ],
            [
                'cantidadUnitario' => 5,
                'producto_id' => 1,
                'ubicacion_id' => 4
            ],
            [
                'cantidadUnitario' => 1,
                'producto_id' => 2,
                'ubicacion_id' => 4
            ],
        ];
        foreach ($ubicacionproductos as $up) {
            UbicacionProducto::create($up);
        }
    }
}

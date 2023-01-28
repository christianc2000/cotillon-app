<?php

namespace Database\Seeders;

use App\Models\Precio;
use Illuminate\Database\Seeder;

class PrecioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $precios = [
            [
                'precio' => 15,
                'tipoPrecio' => 'U', //UNITARIO
                'producto_id' => 3,
            ],
            [
                'precio' => 12,
                'fecha_finalizado'=>'2023-01-20',
                'habilitado'=>false,
                'tipoPrecio' => 'U', //UNITARIO
                'producto_id' => 1,
            ],
            [
                'precio' => 13,
                'tipoPrecio' => 'U', //UNITARIO
                'producto_id' => 1,
            ],
            [
                'precio' => 15,
                'tipoPrecio' => 'U', //UNITARIO
                'producto_id' => 2,
            ]
        ];
        foreach ($precios as $p) {
            Precio::create($p);
        }
    }
}

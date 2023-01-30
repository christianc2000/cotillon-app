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
                'precio'=>13,
                'fecha_finalizado'=>null,
                'habilitado'=>true,
                'producto_id'=>1
            ],
            [
                'precio'=>318,
                'fecha_finalizado'=>null,
                'habilitado'=>true,
                'producto_id'=>2
            ],
            [
                'precio'=>13,
                'fecha_finalizado'=>null,
                'habilitado'=>true,
                'producto_id'=>3
            ],
            [
                'precio'=>15,
                'fecha_finalizado'=>null,
                'habilitado'=>true,
                'producto_id'=>4
            ],
            [
                'precio'=>14,
                'fecha_finalizado'=>'2022-01-22',
                'habilitado'=>false,
                'producto_id'=>5
            ],
            [
                'precio'=>15,
                'fecha_finalizado'=>null,
                'habilitado'=>true,
                'producto_id'=>5
            ],
        ];
        foreach ($precios as $p) {
            Precio::create($p);
        }
    }
}

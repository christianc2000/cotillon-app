<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class VencimientoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $vencimiento = [
            [
                'codigo' => 'L0001',
                'cantidad' => 4,
                'fechaVencimiento' => null,
                'vencido' => false,
                'stock' => 4,
                'producto_id' => 1
            ],
            [
                'codigo' => 'L0002',
                'cantidad' => 2,
                'fechaVencimiento' => null,
                'vencido' => false,
                'stock' => 2,
                'producto_id' => 2
            ],
            [
                'codigo' => 'L0003',
                'cantidad' => 5,
                'fechaVencimiento' => null,
                'vencido' => false,
                'stock' => 5,
                'producto_id' => 3
            ],
            [
                'codigo' => 'L0004',
                'cantidad' => 10,
                'fechaVencimiento' => null,
                'vencido' => false,
                'stock' => 10,
                'producto_id' => 4
            ],
            [
                'codigo' => 'L0005',
                'cantidad' => 11,
                'fechaVencimiento' => null,
                'vencido' => false,
                'stock' => 11,
                'producto_id' => 5
            ]
        ];
    }
}

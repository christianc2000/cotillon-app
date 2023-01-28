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
                'codigo'=>'L0001',
                'cantidad'=>11,
                'fechaVencimiento'=>null,
                'vencido'=>false,
                'stock'=>11,
                'producto_id'=>1  
            ],
            [
                'codigo'=>'L0002',
                'cantidad'=>3,
                'fechaVencimiento'=>null,
                'vencido'=>false,
                'stock'=>3,
                'producto_id'=>2 
            ],
            [
                'codigo'=>'L0003',
                'cantidad'=>3,
                'fechaVencimiento'=>null,
                'vencido'=>false,
                'stock'=>3,
                'producto_id'=>1  
            ]
        ];
    }
}

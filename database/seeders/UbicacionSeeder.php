<?php

namespace Database\Seeders;

use App\Models\Ubicacion;
use Illuminate\Database\Seeder;

class UbicacionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $ubicacions = [
            [
                'codigo' => 'V0001',
                'ubicacion' => 'Vitrina de dos puertas chica',
                'tipoUbicacion'=>'Tienda'
            ],
            [
                'codigo' => 'V0002',
                'ubicacion' => 'Vitrina de una puertas larga',
                'tipoUbicacion'=>'Tienda'
            ],
            [
                'codigo' => 'V0003',
                'ubicacion' => 'Vitrina de madera de 2 puertas chica',
                'tipoUbicacion'=>'Tienda'
            ],
            [
                'codigo' => 'V0004',
                'ubicacion' => 'Colgador de velas',
                'tipoUbicacion'=>'Tienda'
            ],
            [
                'codigo' => 'V0005',
                'ubicacion' => 'Sala',
                'tipoUbicacion'=>'Reserva'
            ],
            
        ];
        foreach ($ubicacions as $u) {
            Ubicacion::create($u);
        }
    }
}

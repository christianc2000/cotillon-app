<?php

namespace Database\Seeders;

use App\Models\Contenedor;
use Illuminate\Database\Seeder;

class ContenedorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $contenedores = [
            [
                'nombre' => 'Caja Grande',
                'descripcion' => 'Caja de carton'
            ],
            [
                'nombre' => 'Bolsa',
                'descripcion' => 'Bolsa de yute'
            ],
            [
                'nombre' => 'Caja Mediana',
                'descripcion' => 'Caja de carton'
            ],
            [
                'nombre' => 'Caja chica',
                'descripcion' => 'Caja de carton'
            ],
        ];
        foreach ($contenedores as $c) {
            Contenedor::create($c);
        }
    }
}

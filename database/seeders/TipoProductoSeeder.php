<?php

namespace Database\Seeders;

use App\Models\TipoProducto;
use Illuminate\Database\Seeder;

class TipoProductoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tipoproductos = [
            [
                'tipo' => 'Otro'
            ],
            [
                'tipo' => 'Canasta'
            ],
            [
                'tipo' => 'Piñata'
            ],
            [
                'tipo' => 'Sombrero'
            ],
        ];
        foreach ($tipoproductos as $tp) {
            TipoProducto::create($tp);
        }
    }
}

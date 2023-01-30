<?php

namespace Database\Seeders;

use App\Models\Contenido;
use Illuminate\Database\Seeder;

class ContenidoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Contenido::create([
            'cantidad' => 20,
            'id_padre' => 2,
            'id_hijo' => 1
        ]);
    }
}

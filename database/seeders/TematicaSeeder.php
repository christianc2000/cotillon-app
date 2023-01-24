<?php

namespace Database\Seeders;

use App\Models\Tematica;
use Illuminate\Database\Seeder;

class TematicaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tematicas = [
            [
                'nombre' => 'Frozen',
                'imagen' => 'https://img2.rtve.es/v/2170774?w=1600&preview=1385454850455.jpg'
            ],
            [
                'nombre' => 'Sonic',
                'imagen' => 'https://i0.wp.com/imgs.hipertextual.com/wp-content/uploads/2019/11/hipertextual-sonic-presume-su-rediseno-nuevo-trailer-su-pelicula-2019187843.jpg'
            ],
            [
                'nombre' => 'Capitan America',
                'imagen' => 'https://i0.wp.com/imgs.hipertextual.com/wp-content/uploads/2019/05/hipertextual-avengers-endgame-futuro-capitan-america-2019781893-scaled.jpg'
            ],

        ];
        foreach ($tematicas as $tematica) {
            Tematica::create($tematica);
        }
    }
}

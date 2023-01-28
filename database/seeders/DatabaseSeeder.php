<?php

namespace Database\Seeders;


use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call(UserSeeder::class);
        $this->call(TematicaSeeder::class);
       // $this->call(UbicacionSeeder::class);
        $this->call(TipoProductoSeeder::class);
        $this->call(ProductoSeeder::class);
        //$this->call(UbicacionProductoSeeder::class);
        $this->call(PrecioSeeder::class);
        $this->call(ContenedorSeeder::class);
        $this->call(ContenedorProductoSeeder::class);
        $this->call(VencimientoSeeder::class);
    }
}

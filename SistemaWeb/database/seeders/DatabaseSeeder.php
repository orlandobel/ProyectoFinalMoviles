<?php

namespace Database\Seeders;

use App\Models\Agrupamiento;
use App\Models\Notificacion;
use App\Models\Usuario;
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
        $this->call(ProgramaSeeder::class);
        $this->call(GrupoSeeder::class);

        Usuario::factory(30)->create();
        Agrupamiento::factory(30)->create();
        Notificacion::factory(10)->create();
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Programa;

class ProgramaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $p1 = new Programa([
            'nombre' => 'Sistemas Computacionales',
            'descripcion' => 'Carrera de ingeniería en sistemas computacionales'
        ]);
        $p1->save();

        $p2 = new Programa([
            'nombre' => 'Mecatrónica',
            'descripcion' => 'Carrera de ingeniería en mecatrónica'
        ]);
        $p2->save();

        $p3 = new Programa([
            'nombre' => 'Alimentos',
            'descripcion' => 'Carrera de ingeniería en alimentos'
        ]);
        $p3->save();

        $p4 = new Programa([
            'nombre' => 'Ambiental',
            'descripcion' => 'Carrera de ingeniería ambiental'
        ]);
        $p4->save();

        $p5 = new Programa([
            'nombre' => 'Metalurgica',
            'descripcion' => 'Carrera de ingeniería en metalurgica'
        ]);
        $p5->save();
    }
}

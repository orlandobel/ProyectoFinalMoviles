<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Grupo;

class GrupoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        $g1 = new Grupo([
            'nombre' => 'Becas',
            'descripcion' => 'Alumnos a los que se las ha asignado alguna beca'
        ]);
        $g1->save();

        $g2 = new Grupo([
            'nombre' => 'Nuevo ingreso',
            'descripcion' => 'Alumnos a de nuevo ingreso'
        ]);
        $g2->save();

        $g3 = new Grupo([
            'nombre' => 'Doscentes',
            'descripcion' => 'Doscentes de la unidad academica'
        ]);
        $g3->save();
    }
}

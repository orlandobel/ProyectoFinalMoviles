<?php

namespace Database\Factories;

use App\Models\Agrupamiento;
use Illuminate\Database\Eloquent\Factories\Factory;

class AgrupamientoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Agrupamiento::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            //
            'usuario_id' => rand(1, 30),
            'grupo_id' => rand(1, 3),
        ];
    }
}

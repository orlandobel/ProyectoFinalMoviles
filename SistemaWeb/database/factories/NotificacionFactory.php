<?php

namespace Database\Factories;

use App\Models\Notificacion;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class NotificacionFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Notificacion::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            //
            'titulo' => Str::random(10),
            'descripcion' => $this->faker->paragraph(),
            'fecha' => now(),
            'grupo_id' => rand(1,3)
        ];
    }
}

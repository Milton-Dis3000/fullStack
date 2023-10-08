<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Usuario>
 */
class UsuarioFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'usuario' => fake()->email,
            'clave' => fake()->password, 
            'habilitado' => fake()->randomElement(['habilitado', 'no_habilitado']),
            'fecha' => fake()->date(),
            // 'fecha_creacion' => fake()->date(),
            // 'fecha_modificacion' => fake()->date(),
            // 'usuario_creacion' => fake()->date(),
            // 'usuario_modificacion' => fake()->date(),
            'id_persona' => rand(1,10),
            'id_rol' => rand(1,10),
        ];
    }
}

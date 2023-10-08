<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Pagina>
 */
class PaginaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            // 'fecha_creacion' => fake()->date(),
            // 'fecha_modificacion' => fake()->date(),
            // 'usuario_creacion' => fake()->date(),
            // 'usuario_modificacion' => fake()->date(),
            'url' => fake()->url,
            'estado' => fake()->randomElement(['activo', 'inactivo']),
            'nombre' => fake()->word,
            'descripcion' => fake()->sentence,
            'icono' => fake()->imageUrl,
            'tipo' => fake()->word,
        ];
    }
}

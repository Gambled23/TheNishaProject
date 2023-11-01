<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\producto>
 */
class productoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nombre'=>$this->faker->unique()->word(),
            'descripcion'=>$this->faker->text(),
            'precio'=>$this->faker->randomFloat(2, 0, 1000),
            'disponibles'=>$this->faker->numberBetween(0, 1000),
        ];
    }
}

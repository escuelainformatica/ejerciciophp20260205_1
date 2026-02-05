<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Libro>
 */
class LibroFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
              'Titulo' => fake()->catchPhrase(),
              'Autor' => fake()->name,
              'NumPaginas' => fake()->numberBetween(50,200),
              'Precio' => fake()->numberBetween(1,1000),
        ];
    }
    /*
- [ ] ID
- [ ] Titulo
- [ ] Autor
- [ ] NumPaginas
- [ ] Precio
    */
}

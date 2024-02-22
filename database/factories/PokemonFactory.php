<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Config;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class PokemonFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $pokemons = Config('pokemons');
        $elements = Config('elements');
        return [
            'breed' => fake()->randomElement($pokemons),
            'element' => fake()->randomElement($elements),
            'age' => random_int(16, 116)
        ];
    }
}

<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->word(),
            'harga_modal' => fake()->randomNumber(5, true),
            'harga_jual' => fake()->randomNumber(5, true),
            'quantity' => fake()->randomNumber(2, true),
            'uom' => fake()->word(),
            'vendor' => fake()->word(),
        ];
    }
}

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
            'category_id' => 1,
            'name' => fake()->words(3, true),
            'description' => fake()->paragraph(2),
            'price' => fake()->randomFloat(2, 19.99, 799.99),
            'stock' => fake()->numberBetween(1, 200),
            'photo_path' => null,
        ];
    }
}

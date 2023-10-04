<?php

namespace Database\Factories;

use App\Models\SubCategory;
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
            'name' => fake()->text(100),
            'description' => fake()->text(150),
            'price' => fake()->randomFloat(2, 0, 10000),
            'quantity' => fake()->numberBetween(0, 50),
            'visible' => fake()->numberBetween(0, 3),
            'sub_category_id' => fake()->randomElement(SubCategory::all()->pluck('id')),
        ];
    }
}

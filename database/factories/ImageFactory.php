<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Image>
 */
class ImageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'url' => fake()->imageUrl(),
            'visible' => fake()->numberBetween(0, 10),
            'object_id' => fake()->randomElement(Category::all()->pluck('id')),
            'object_type' => fake()->randomElement([
                'App\Models\Product',
                'App\Models\Customer',
                'App\Models\Category',
                'App\Models\SubCategory',
            ])
        ];
    }
}

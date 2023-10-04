<?php

namespace Database\Factories;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\OrderProduct>
 */
class OrderProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'quantity' => fake()->numberBetween(0, 50),
            'price' => fake()->randomFloat(2, 0, 10000),
            'total' => fake()->randomFloat(2, 0, 10000),
            'product_id' => fake()->randomElement(Product::all()->pluck('id')),
            'order_id' => fake()->randomElement(Order::all()->pluck('id')),
        ];
    }
}

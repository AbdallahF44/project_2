<?php

namespace Database\Factories;

use App\Models\Address;
use App\Models\Customer;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Order>
 */
class OrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'total' => fake()->randomFloat(2, 0, 10000),
            'status' => fake()->boolean(),
            'payment_type' => fake()->randomElement(['online', 'ondelivery']),
            'date' => fake()->dateTime(),
            'discount' => fake()->randomFloat(2, 0, 10000),
            'customer_id' => fake()->randomElement(Customer::all()->pluck('id')),
            'address_id' => fake()->randomElement(Address::all()->pluck('id')),
        ];
    }
}

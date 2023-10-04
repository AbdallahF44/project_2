<?php

namespace Database\Factories;

use App\Models\Customer;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Address>
 */
class AddressFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->text(45),
            'street' => fake()->streetAddress(),
            'description' => fake()->text(100),
            'notes' => fake()->text(45),
            'primary' => fake()->boolean(),
            'customer_id' => fake()->randomElement(Customer::all()->pluck('id')),
        ];
    }
}

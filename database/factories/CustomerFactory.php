<?php

namespace Database\Factories;

use App\Models\City;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Customer>
 */
class CustomerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'email' => fake()->email(),
            'password' => fake()->password(10, 11),
            'mobile' => fake()->phoneNumber(),
            'gender' => fake()->randomElement(['M', 'F']),
            'active' => fake()->numberBetween(0, 4),
            'city_id' => fake()->randomElement(City::all()->pluck('id')),
        ];
    }
}

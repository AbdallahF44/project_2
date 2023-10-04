<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Models\User::factory(10)->create();
        \App\Models\City::factory(20)->create();
        \App\Models\Category::factory(10)->create();
        \App\Models\SubCategory::factory(50)->create();
        \App\Models\Product::factory(1000)->create();
        \App\Models\Customer::factory(20)->create();
        \App\Models\Favorite::factory(20)->create();
        \App\Models\ProductDetail::factory(100)->create();
        \App\Models\Image::factory(100)->create();
        \App\Models\Address::factory(50)->create();
        \App\Models\Order::factory(200)->create();
        \App\Models\OrderProduct::factory(200)->create();
    }
}

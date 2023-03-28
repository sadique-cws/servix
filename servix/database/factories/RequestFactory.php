<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Request>
 */
class RequestFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'owner_name' => fake()->name(),
            'product_name' => fake()->name(),
            'brand' => fake()->name(),
            'service_code' => fake()->randomDigit(),
            'type_id' => fake()->numberBetween(1,4),
            'color' => fake()->colorName(),
            'problem' => fake()->name(),
            'remark' => fake()->name(),
            'status' => fake()->boolean(),
            'estimate_delivery' => "25-05-2023",
            'date_of_creation' => "25-05-2023",
            
        ];
    }
}

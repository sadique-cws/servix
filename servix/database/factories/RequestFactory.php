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
            'service_code' => fake()->randomDigit(),
            'product_name' => fake()->lastName(),
            'email' => fake()->email(),
            'contact' => fake()->phoneNumber(),
            'type_id' =>fake()->numberBetween(1,4),
            'brand' => fake()->company(),
            'color' => fake()->colorName(),
            'problem' => fake()->word(),
        ];
    }
}

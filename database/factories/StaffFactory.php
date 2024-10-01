<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Staff>
 */
class StaffFactory extends Factory
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
            'contact' => fake()->phonenumber(),
            'salary' => fake()->randomDigit(),
            'type_id' => fake()->numberBetween(1,4),
            'status' => fake()->boolean(),
            'aadhar' => fake()->randomDigit(),
            'pan' => fake()->randomDigit(),
            'address' => fake()->address(),
            'password' => "12345",
        ];
    }
}

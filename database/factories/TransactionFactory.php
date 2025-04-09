<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Transaction>
 */
class TransactionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => 1,
            'summary' => fake()->realText(20),
            'amount' => fake()->numberBetween(100, 100000),
            'status' => fake()->randomElement(['pending', 'approved', 'rejected']),
        ];
    }
}

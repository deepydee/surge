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
    public function definition()
    {
        return [
            'title' => 'Payment to '. fake()->name(),
            'amount' => fake()->randomNumber(3, false),
            'status' => fake()->randomElement(['success', 'failed', 'processing']),
            'date' => fake()->dateTimeBetween('-1 year', 'now'),
        ];
    }
}

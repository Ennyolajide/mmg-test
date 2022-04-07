<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\WalletType>
 */
class WalletTypeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => array_rand(['Saver', 'Pension', 'Future', 'Ballers', 'Getters', 'Achievers']). ' '. $this->faker->domainWord,
            'minimum_balance' => $this->faker->numberBetween(1,10) * $this->faker->randomDigitNotZero() *  100,
            'interest_rate' => $this->faker->numberBetween(5,30),
        ];
    }
}

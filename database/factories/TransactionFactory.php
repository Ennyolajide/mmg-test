<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Wallet;
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
            'type' => array_rand(array_flip(['Credit', 'Debit'])),
            'user_id' => User::inRandomOrder()->first()->id,
            'wallet_id' => Wallet::inRandomOrder()->first()->id,
            'amount' => rand(1,20) * 100,
            'balance_before' => rand(1,20) * 100,
            'balance_after' => rand(1,20) * 100,
        ];
    }
}

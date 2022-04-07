<?php

namespace Database\Seeders;


use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Wallet;
use App\Models\UserInfo;
use App\Models\WalletType;
use App\Models\Transaction;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        // create 5 wallet Types
        WalletType::factory(5)->create();

        //seed 5  Users with the neccessary userinfo
        //seed all the wallet types for each users
        //seed 5 Transactions for each user's wallet
        User::factory(5)->afterCreating(function (User $user) {
            UserInfo::factory()->create(['user_id' => $user->id]);
        })->afterCreating(function (User $user) {
            WalletType::all()->each(function ($wallType) use ($user) {
                Wallet::factory()->create([
                    'user_id' => $user->id,
                    'wallet_type_id' => $wallType->id,
                    'balance' => $wallType->minimum_balance + (rand(1,20)*1000) // seed a balance greater than the minimum balance for the wallet type
                ])->each(function ($wallet) use ($user){
                    Transaction::factory()->count(5)->create([
                        'user_id' => $user->id,
                        'wallet_id' => $wallet->id,
                    ]);
                });
             });
        })->create();
    }
}

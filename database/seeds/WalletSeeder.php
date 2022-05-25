<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Trade;
use App\Wallet;

use Faker\Generator as Faker;


class WalletSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Wallet::create([
            "user_id"        => 1,
        ]);
        Wallet::create([
            "user_id"        => 2,
        ]);
        Wallet::create([
            "user_id"        => 3,
        ]);
        Wallet::create([
            "user_id"        => 4,
        ]);
        Wallet::create([
            "user_id"        => 5,
        ]);
        Wallet::create([
            "user_id"        => 6,
        ]);
    }
}

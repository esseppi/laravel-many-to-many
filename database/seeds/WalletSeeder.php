<?php

use Illuminate\Database\Seeder;
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
            "id"             => 1,
            // "coin_id"        => 2,
            "user_id"        => 1,
            "slug"           => Wallet::generateSlug(1),
        ]);
        Wallet::create([
            "id"             => 2,
            // "coin_id"        => 2,
            "user_id"        => 2,
            "slug"           => Wallet::generateSlug(2),

        ]);
        Wallet::create([
            "id"             => 3,
            "user_id"        => 3,
            // "coin_id"        => 2,
            "slug"           => Wallet::generateSlug(3),

        ]);
        Wallet::create([
            "id"             => 4,
            "user_id"        => 4,
            // "coin_id"        => 2,
            "slug"           => Wallet::generateSlug(4),

        ]);
        Wallet::create([
            "id"             => 5,
            "user_id"        => 5,
            // "coin_id"        => 2,
            "slug"           => Wallet::generateSlug(5),

        ]);
        Wallet::create([
            "id"             => 6,
            "user_id"        => 6,
            // "coin_id"        => 2,
            "slug"           => Wallet::generateSlug(6),

        ]);
        Wallet::create([
            "id"             => 7,
            // "coin_id"        => 2,
            "user_id"        => 6,
            "slug"           => Wallet::generateSlug(6),
        ]);
    }
}

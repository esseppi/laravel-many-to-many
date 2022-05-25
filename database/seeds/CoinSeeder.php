<?php

use App\Coin;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use Illuminate\Support\Facades\Http;



class CoinSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    public function run()
    {
        // SELEZIONA LE COINS INIZIAL SPECIFICANDO IL NOME NELL'ARRAY initialCoins
        $link = 'https://api.coingecko.com/api/v3/coins/';
        $initialCoins = ['bitcoin', 'ethereum', 'tether', 'polkadot', 'monero', 'dash', 'uniswap', 'tron', 'frax'];
        for ($i = 0; $i < count($initialCoins); $i++) {
            $word = strtolower($initialCoins[$i]);
            $coin = Http::get($link . $word)->json();
            Coin::create([
                "description" => $coin['description']['en'],
                "name"        => strtoupper($coin['name']),
                "image"       => $coin['image']['large'],
                "slug"        => Coin::generateSlug($coin['name'])
            ]);
        }
    }
}

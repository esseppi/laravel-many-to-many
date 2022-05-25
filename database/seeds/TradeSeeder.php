<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

use App\Trade;
use App\User;
use App\Coin;
use App\Wallet;
use Illuminate\Support\Facades\Http;

class TradeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $coins = Coin::all()->count();

        for ($i = 0; $i < $coins; $i++) {

            $wallet = Wallet::inRandomOrder()->first();
            $coin1 = Coin::inRandomOrder()->first();
            $coin2 = Coin::inRandomOrder()->first();
            $amountExchanged = $faker->numberBetween(0, 100);
            $tradeDir = $faker->boolean();
            $date = $faker->dateTimeInInterval('-2 year', '-2 days');
            $formattedDate = date_format($date, "d-m-Y");
            if ($coin1 == $coin2) {
                $coin2 = Coin::inRandomOrder()->first();
            }
            $link1 = 'https://api.coingecko.com/api/v3/coins/' . strtolower($coin1->name) . '/history?date=' . $formattedDate;
            $link2 = 'https://api.coingecko.com/api/v3/coins/' . strtolower($coin2->name) . '/history?date=' . $formattedDate;

            $data1 = Http::get($link1)->json();
            $data2 = Http::get($link2)->json();

            $tradeSlug =  $coin1->name . $wallet->id . $coin2->name;
            Trade::create([
                'baseCoin_id'    => $coin1->id,
                'wallet_id'      => $wallet->id,
                'foreignCoin_id' => $coin2->id,
                'date'           => $date,
                'basePrice'      => $faker->numberBetween(0, 10000),
                'foreignPrice'   => $faker->numberBetween(0, 10000),
                'baseAmount'     => $amountExchanged,
                'foreignAmount'  => $faker->numberBetween(0, 10000),
                'tradeDir'       => $tradeDir,
                'slug'           => Trade::generateSlug($tradeSlug),
                'comments'       => $faker->sentence(rand(0, 10)),
            ]);
        }
    }
}

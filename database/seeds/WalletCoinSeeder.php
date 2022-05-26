<?php

use App\Coin;
use App\Trade;
use App\Wallet;
use Illuminate\Database\Seeder;

class WalletCoinSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    public function run()
    {
        $wallets = Wallet::all();
        foreach ($wallets as $wallet) {
            $trades = Trade::all();
            $trades = $trades->where('wallet_id', 'LIKE', "$wallet->id");
            $coins = Coin::all();

            foreach ($trades as $trade) {
                $coinBase = $trade->baseCoin_id;
                $walletId = $trade->wallet_id;
                $wallet->coins()->attach($trade->pluck('baseCoin_id')->all());


                // $wallet->coin()->attach($coinBase->pluck('coin_id')->all());
                // $wallet->tags()->attach($coin1->pluck('coin_id')->all());
            }
        }
    }
    // public function run()
    // {
    //     $posts = Post::all();

    //     foreach ($posts as $post) {
    //         $postTags = Tag::inRandomOrder()->limit(rand(0, 5))->get();

    //         $post->tags()->attach($postTags->pluck('id')->all());
    //     }
    // }
}

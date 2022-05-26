<?php

namespace App;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;

class Wallet extends Model
{
    protected $fillable = [
        "slug",
        "user_id",
        "trade_id",
    ];
    static public function generateSlug($generatorString)
    {

        $baseSlug = Str::of($generatorString)->slug('-')->__toString();
        $slug = $baseSlug;
        $_i = 1;
        while (self::where('slug', $slug)->first()) {
            $slug = "$baseSlug-$_i";
            $_i++;
        }
        return $slug;
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function trade()
    {
        return $this->hasMany(Trade::class, 'trade_id');
    }
    public function coins()
    {
        return $this->belongsToMany(Coin::class, 'coin_id');
    }
}

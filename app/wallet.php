<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Wallet extends Model
{
    protected $fillable = [
        "user_id",
        "trade_id",
    ];
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function trade()
    {
        return $this->hasMany(Trade::class, 'trade_id');
    }
}

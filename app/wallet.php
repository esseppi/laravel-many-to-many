<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Wallet extends Model
{
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function trade()
    {
        return $this->hasMany(Trade::class, 'trade_id');
    }
}

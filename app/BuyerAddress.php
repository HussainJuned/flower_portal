<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BuyerAddress extends Model
{
    protected $table = 'buyer_addresses';

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}

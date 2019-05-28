<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BuyerInvoice extends Model
{
    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    public function buyer()
    {
        return $this->belongsTo(User::class);
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Buyer extends Model
{
    protected $table = "buyers";

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

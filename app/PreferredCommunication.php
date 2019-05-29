<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PreferredCommunication extends Model
{
    protected $table = 'preferred_communications';

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

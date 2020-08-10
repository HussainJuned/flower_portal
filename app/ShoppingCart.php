<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ShoppingCart extends Model
{
    //
    public function product()
    {
        return $this->hasOne(Product::class, 'id');
    }
}

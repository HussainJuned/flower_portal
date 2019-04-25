<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BuyerAccountReview extends Model
{
    protected $fillable = ['buyer_user_id', 'seller_user_id', 'order_id', 'quality', 'comment', 'created_at', 'updated_at'];

    public function getSeller()
    {
        return $this->belongsTo(User::class, 'seller_user_id');
    }

    public function getBuyer()
    {
        return $this->belongsTo(User::class, 'buyer_user_id');
    }

    public function getOrder()
    {
        return $this->belongsTo(Order::class, 'order_id');
    }

    public function scopeGetBar($query, $buyer_user_id, $seller_user_id)
    {
        return $query->where('buyer_user_id', $buyer_user_id)->where('seller_user_id', $seller_user_id);
    }


}

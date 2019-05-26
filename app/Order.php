<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{


    public function buyer()
    {
        return $this->belongsTo(User::class, 'buyer_user_id');
    }

    public function seller()
    {
        return $this->belongsTo(User::class, 'seller_user_id');
    }

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }

    public function orderProducts()
    {
        return $this->hasMany(OrderProduct::class, 'order_id');
    }



    /*public function products()
    {
        return $this->hasManyThrough(OrderProduct::class, Product::class);
    }*/


    public function productReview()
    {
        return $this->hasOne(ProductReview::class, 'order_id');
    }

    public function buyerAccountReview()
    {
        return $this->hasOne(BuyerAccountReview::class, 'order_id');
    }


    public function statusToString()
    {
        switch ($this->status)
        {
            case 1:
                return "Submitted";
            case 2:
                return "Confirmed";
            case 3:
                return "Shipped";
            case 4:
                return "Delivered";
            case 5:
                return "Full Filled";

        }
    }

    /*public function setOrderDateAttribute($value)
    {
        $this->attributes['order_date'] = Carbon::createFromFormat('d-m-Y', $value);
    }*/



}

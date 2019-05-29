<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends \TCG\Voyager\Models\User
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function userinfo()
    {
        return $this->hasOne(Userinfo::class);
    }

    public function preferred_communication()
    {
        return $this->hasOne(PreferredCommunication::class);
    }



    public function products()
    {
        return $this->hasMany(Product::class);
    }

    public function orders_as_seller()
    {
        return $this->hasMany(Order::class, 'seller_user_id');
    }

    public function orders_as_buyer()
    {
        return $this->hasMany(Order::class, 'buyer_user_id');
    }

    public function buyerAccountReviews()
    {
        return $this->hasMany(BuyerAccountReview::class, 'buyer_user_id');
    }

    public function buyerAddresses()
    {
        return $this->hasMany(BuyerAddress::class, 'user_id');
    }




    public function isBuyer()
    {
        if($this->buyer)
        {
            return true;
        } else {
            return false;
        }

    }

    public function isSeller()
    {
        if(count($this->products) > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function upcomingOrdersSeller()
    {
        return $this->orders_as_seller()->where('status', '!=', 5)->orderBy('created_at', 'desc');
    }

    public function pastOrdersSeller()
    {
        return $this->orders_as_seller()->where('status', '=', 5)->orderBy('created_at', 'desc');
    }

    public function upcomingOrdersBuyer()
    {
        return $this->orders_as_buyer()->where('status', '!=', 5)->orderBy('created_at', 'desc');
    }

    public function pastOrdersBuyer()
    {
        return $this->orders_as_buyer()->where('status', '=', 5)->orderBy('created_at', 'desc');
    }

    public function availableProducts()
    {
        return $this->products()->where('status', '=', true)
            ->where('status', '=', true)
            ->where('available_date_end', '>=', \Carbon\Carbon::now()->toDateString());
    }


}

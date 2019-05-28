<?php

namespace App\Http\Controllers;

use App\BuyerAddress;
use Illuminate\Http\Request;

class BuyerAddressController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public static function store(array $request, $user_id)
    {
        $address = new BuyerAddress;
        $address->user_id = $user_id;
        $address->country = $request['country'];
        $address->state = $request['state'];
        $address->city = $request['city'];
        $address->delivery_address_1 = $request['delivery_address_1'];
        $address->delivery_address_2 = $request['delivery_address_2'];
        $address->zip = $request['zip'];
        $address->suite = $request['suite'];
        $address->buzzer = $request['buzzer'];

        $address->save();

        return $address->id;
    }
}

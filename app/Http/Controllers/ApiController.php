<?php

namespace App\Http\Controllers;

use App\BuyerAddress;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function buyerAddresses( Request $request )
    {
        return BuyerAddress::find($request->address_id);
    }

    public function setSessionOrderDate(Request $request)
    {
        session()->put('order_date', $request->order_date);
        return $request->order_date;
    }

    public function getSessionOrderDate(Request $request)
    {
        //return session()->get('order_date', '2019-07-18');
        return session()->get('order_date', Carbon::today()->toDateString());
    }


}

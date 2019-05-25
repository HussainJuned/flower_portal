<?php

namespace App\Http\Controllers;

use App\BuyerAddress;
use App\User;
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
}

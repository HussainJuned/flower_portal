<?php

namespace App\Http\Controllers;

use App\Product;
use App\ShoppingCart;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ShoppingCartController extends Controller
{
    //
    public function store(Request $request, Product $product)
    {

        $sc = new ShoppingCart();
        $sc->user_id = \Auth::id();
        $sc->product_id = $product->id;
        $sc->quantity = $request['quantity'];
        $sc->total_price = $request['total_price'];
        $sc->delivery_date = $request['delivery_date'];
        $sc->save();

        return "done";
    }

    public function viewAll(Request $request)
    {
        // return $request->delivery_date;
        return ShoppingCart::where("user_id", auth()->id())->with('product')->get();
        // return ShoppingCart::where("user_id", auth()->id())->where("delivery_date", $request->delivery_date)->with('product')->get();
    }
}

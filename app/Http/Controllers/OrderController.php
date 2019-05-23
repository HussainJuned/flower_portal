<?php

namespace App\Http\Controllers;

use App\Order;
use App\Product;
use Carbon\Carbon;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Product $product)
    {
        if (auth()->id() == $product->user->id) {
            return redirect()
                ->back()
                ->withErrors(['order_error' => 'You can not buy your own product']);
        }

        $order = new Order();
        $order->buyer_user_id = auth()->id();
        $order->seller_user_id = $product->user->id;
        $order->product_id = $product->id;
        $order->zip = auth()->user()->userinfo->zip;
        $order->order_date = $request['order_date'];
        $order->quantity = $request['quantity'];
        $order->unit_price = $product->price;
        $order->total_price = $product->price * $request['quantity'];
        $order->status = 1; // 1 = submitted
        $order->shipping = auth()->user()->userinfo->delivery_address_1 . auth()->user()->userinfo->delivery_address_2;

        $order->save();

        return view('pages.orders.view', compact('order'));

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        return view('pages.orders.view', compact('order'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        //
    }


    public function bulkStore(Request $request)
    {
        return $request;
        /*if (auth()->id() == $product->user->id) {
            return redirect()
                ->back()
                ->withErrors(['order_error' => 'You can not buy your own product']);
        }

        $order = new Order();
        $order->buyer_user_id = auth()->id();
        $order->seller_user_id = $product->user->id;
        $order->product_id = $product->id;
        $order->zip = auth()->user()->userinfo->zip;
        $order->order_date = $request['order_date'];
        $order->quantity = $request['quantity'];
        $order->unit_price = $product->price;
        $order->total_price = $product->price * $request['quantity'];
        $order->status = 1; // 1 = submitted
        $order->shipping = auth()->user()->userinfo->delivery_address_1 . auth()->user()->userinfo->delivery_address_2;

        $order->save();

        return view('pages.orders.view', compact('order'));*/

    }


}

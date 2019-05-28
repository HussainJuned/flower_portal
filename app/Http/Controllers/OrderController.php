<?php

namespace App\Http\Controllers;

use App\BuyerAddress;
use App\BuyerInvoice;
use App\Order;
use App\OrderProduct;
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
     * @param \Illuminate\Http\Request $request
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
     * @param \App\Order $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        return view('pages.orders.view', compact('order'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Order $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Order $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Order $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        //
    }


    public function bulkStore(Request $request)
    {
//        return $request;
        /*if($request->has('delivery_address_id')) {
            if ($request['delivery_address_id'] === 'new') {
                BuyerAddressController::store($request->toArray(), auth()->id());
            }
        }*/

        /*if (auth()->id() == $product->user->id) {
            return redirect()
                ->back()
                ->withErrors(['order_error' => 'You can not buy your own product']);
        }*/

        $products = [];
        $orders = array(array());
        $q = $request->quantity;


        if ( $request->has('product_id') )
        {
            foreach ($request['product_id'] as $index => $prouct_id) {
                $product = Product::find($prouct_id);

                $product->quantity = $q[$index];
                $products[] = $product;
            }
        }


        usort($products, array($this, 'cmp'));

        $tmp = array();
        $oi = -1;
        foreach ($products as $index => $item) {
            if (!in_array($item['user_id'], $tmp, true)) {
//                $unique[] = $item;
                $tmp[] = $item['user_id'];
                $oi++;
                $orders[$oi][$index] = $item;
            } else {
                $orders[$oi][$index] = $item;
            }
        }


//        return $orders;

        foreach ($orders as $key=>$ind_order)
        {

            $otp = 0;
            $order = new Order();
            $order->buyer_user_id = auth()->id();

            foreach ($ind_order as $k => $o){
                $order->seller_user_id = $o->user_id;
            }


//            $order->order_date = $request['delivery_date'];
            $order->order_date = $request['delivery_date'];
            $order->order_total_price = $otp;
            $order->status = 1; // 1 = submitted
            $order->purchase_order_name = $request['purchase_order_name'];
            $order->delivery_option = $request['delivery_option'];

            if($request->has('delivery_address_id')) {
                if ($request['delivery_address_id'] === 'new') {
                    $order->buyer_address_id = BuyerAddressController::store($request->toArray(), auth()->id());
                } else {
                    $order->buyer_address_id = $request['delivery_address_id'];
                }

            }


            $order->save();

            foreach ($ind_order as $k => $o)
            {
                $order_product = new OrderProduct;
                $order_product->product_id = $o->id;
                $order_product->order_id = $order->id;
                $order_product->quantity = $o->quantity;
                $order_product->unit_price = $o->price;
                $order_product->total_price = $o->price * $o->quantity;
                $order_product->save();

                $otp += $order_product->total_price;
            }
            $order->order_total_price = $otp;
            $order->update();

            $invoice = new BuyerInvoice;
            $invoice->user_id = $order->buyer_user_id;
            $invoice->order_id = $order->id;
            $invoice->due_date = $order->order_date;
            $invoice->currency = 'CAD';
            $invoice->amount = $order->order_total_price;
            $invoice->paid = 0;
            $invoice->outstanding = $order->order_total_price;
            $invoice->age_of_invoice = 1;
            $invoice->save();
        }



        $user = auth()->user();
        $upcoming_orders = $user->upcomingOrdersBuyer;
        $past_orders = $user->pastOrdersBuyer()->paginate(10);

        return redirect()->route('buyer_dashboard.buyer_dashboard')
            ->with('upcoming_orders' , $upcoming_orders)
            ->with('past_orders' , $past_orders);

    }

    public function buyerOrderDetais(Request $request)
    {

        $products = [];
//        $orders = [];

        if ( $request->has('product_id') )
        {
            foreach ($request['product_id'] as $prouct_id) {
                $products[] = Product::find($prouct_id);
            }
        }

//        array_unique($products, SORT_REGULAR);

//        $tmp = array();
        /*foreach ($products as $item) {
            if (!in_array($item['user_id'], $tmp, true)) {
                $unique[] = $item;
                $tmp[] = $item['user_id'];
            }
        }*/

        return view('pages.orders.deatials_buyer')
            ->with('products', $products)
            ->with('quantity', $request['quantity'])
            ->with('delivery_date', $request['delivery_date'])
            ->with('order_date', $request['order_date']);
    }

    function cmp($a, $b)
    {
        if ($a == $b) {
            return 0;
        }
        return ($a < $b) ? -1 : 1;
//        return strcmp($a->user_id, $b->user_id);
    }

}

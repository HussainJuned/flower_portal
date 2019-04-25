<?php

namespace App\Http\Controllers;

use App\Order;
use App\Product;
use App\ProductReview;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class ProductReviewController extends Controller
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
        return view('partials.product_review_box');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param Product $product
     * @return ProductReview
     */
    public function store(Request $request, Order $order, Product $product)
    {
        $validated_data = $request->validate([
           'quality' => 'required|integer|max:5|min:1',
           'comment' => 'required|string|max:500|min:1',
        ]);

        /*$pr = new ProductReview();
        $pr->product_id = $request['product_id'];
        $pr->quality = $request['quality'];
        $pr->comment = $request['comment'];
        $pr->order_id = $request['order_id'];

        $pr->save();*/

        if(auth()->id() !== $order->buyer_user_id || $order->product_id !== $product->id) {
            return redirect()->back()->withErrors('Something went wrong');
        }

        $pr = ProductReview::updateOrCreate(
            ['order_id' => $order->id, 'product_id' => $product->id],
            ['comment' => Input::get('comment'), 'quality' => Input::get('quality')]
        );

        return redirect()->back()->with('message', 'Product Reviewed Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ProductReview  $productReview
     * @return \Illuminate\Http\Response
     */
    public function show(ProductReview $productReview)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ProductReview  $productReview
     * @return \Illuminate\Http\Response
     */
    public function edit(ProductReview $productReview)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ProductReview  $productReview
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProductReview $productReview)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ProductReview  $productReview
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProductReview $productReview)
    {
        //
    }
}

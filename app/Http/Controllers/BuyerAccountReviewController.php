<?php

namespace App\Http\Controllers;

use App\BuyerAccountReview;
use App\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class BuyerAccountReviewController extends Controller
{
    public function store(Request $request, Order $order)
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

        if(auth()->id() !== $order->seller_user_id) {
            return redirect()->back()->withErrors('Something went wrong');
        }

        $bar = BuyerAccountReview::updateOrCreate(
            ['seller_user_id' => $order->seller_user_id, 'buyer_user_id' => $order->buyer_user_id],
            ['comment' => Input::get('comment'), 'order_id' => $order->id, 'quality' => Input::get('quality')]
        );

        return redirect()->back()->with('message', 'Account Reviewed Successfully');
    }
}

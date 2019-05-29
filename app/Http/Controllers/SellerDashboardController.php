<?php

namespace App\Http\Controllers;

use App\Mail\OrderConfirmationMail;
use App\Order;
use App\User;
use Illuminate\Http\Request;
use Mail;
use Matrix\Exception;

class SellerDashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except('sellerProfile');
    }

    public function myProducts()
    {
        $products = auth()->user()->products;
        return view('pages.user_infos.my_products', compact('products'));
    }

    public function sellerDashboard()
    {
        $user = auth()->user();
        $upcoming_orders = $user->upcomingOrdersSeller;
        $past_orders = $user->pastOrdersSeller()->paginate(10);

        return view('pages.dashboards.seller_dashboard', compact('upcoming_orders', 'past_orders'));
    }


    /**
     * @param Order $order
     * @return \Illuminate\Http\RedirectResponse
     */
    public function updateToAccepted(Order $order)
    {
        if ($order->status === 1 && auth()->id() === $order->seller_user_id) {
            $order->status = 2;
            $order->save();
        } else {
            return redirect()->back()->withErrors('Order Status Update unsuccessful');
        }

        try {
            Mail::to($order->buyer->preferred_communication->email_order_confirmation)
                ->send(new OrderConfirmationMail($order));
        } catch (Exception $e) {
            return back()->withInput()->with('error', $e);
        }


        return redirect()->back()->with('message', 'Order Status Updated Successfully');
    }

    public function updateToShipped(Order $order)
    {
        if ($order->status === 2 && auth()->id() === $order->seller_user_id) {
            $order->status = 3;
            $order->save();
        } else {
            return redirect()->back()->withErrors('Order Status Update unsuccessful');
        }

        return redirect()->back()->with('message', 'Order Status Updated Successfully');
    }

    public function updateToDelivered(Order $order)
    {
        if ($order->status === 3 && auth()->id() === $order->seller_user_id) {
            $order->status = 4;
            $order->save();
        } else {
            return redirect()->back()->withErrors('Order Status Update unsuccessful');
        }

        return redirect()->back()->with('message', 'Order Status Updated Successfully');
    }



    public function viewOrder(Order $order)
    {
        return view('pages.dashboards.view_seller_order', compact('order'));
    }

}

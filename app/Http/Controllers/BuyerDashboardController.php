<?php

namespace App\Http\Controllers;

use App\Order;
use App\User;
use Illuminate\Http\Request;

class BuyerDashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except('');
    }

    public function dashboard()
    {
        $user = auth()->user();
        $upcoming_orders = $user->upcomingOrdersBuyer;
        $past_orders = $user->pastOrdersBuyer()->paginate(10);

        return view('pages.dashboards.buyer_dashboard', compact('upcoming_orders', 'past_orders'));
    }

    public function viewOrder(Order $order)
    {
        return view('pages.dashboards.view_buyer_order', compact('order'));
    }

    public function updateOrderStatusToReceived(Order $order)
    {
        if ($order->status === 4 && auth()->id() === $order->buyer_user_id) {
            $order->status = 5;
            $order->save();
        } else {
            return redirect()->back()->withErrors('Order Status Update unsuccessful');
        }

        return redirect()->back()->with('message', 'Order Status Updated Successfully');
    }


}

<?php

namespace App\Http\Controllers;

use App\Mail\OrderCompleteMail;
use App\Mail\OrderStatusUpdateMail;
use App\Order;
use App\User;
use Illuminate\Http\Request;
use Mail;
use Matrix\Exception;

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
        if (auth()->id() === $order->buyer_user_id) {
            $invoice = $order->invoice;
            return view('pages.dashboards.view_buyer_order', compact('order', 'invoice'));
        }

        return redirect()->back()->withErrors('Access denied');
    }

    public function updateOrderStatusToReceived(Order $order)
    {
        if (auth()->id() === $order->buyer_user_id) {
            $order->status = 5;
            $order->save();

            try {
                Mail::to($order->buyer->preferred_communication->email_general)
                    ->send(new OrderCompleteMail($order, 'buyer'));
            } catch (Exception $e) {
                return back()->withInput()->with('error', $e);
            }

            try {
                Mail::to($order->seller->preferred_communication->email_general)
                    ->send(new OrderCompleteMail($order, 'seller'));
            } catch (Exception $e) {
                return back()->withInput()->with('error', $e);
            }



        } else {
            return redirect()->back()->withErrors('Order Status Update unsuccessful');
        }

        return redirect()->back()->with('message', 'Order Status Updated Successfully');
    }

    public function orderHistory ()
    {

    }

    public function viewOrderHistory()
    {
        $orders = auth()->user()->pastOrdersBuyer()->paginate(20);
        return view('pages.orders.buyer_order_history', compact('orders'));

    }

    public function invoices()
    {
        $invoices = auth()->user()->invoices()->paginate(20);
        return view('pages.invoices.buying_invoices', compact('invoices'));
    }

}

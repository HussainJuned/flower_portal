<?php

namespace App\Http\Controllers;

use App\Mail\OrderConfirmationMail;
use App\Mail\OrderStatusUpdateMail;
use App\Mail\OrderStatusUpdateMail_seller;
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
        $products = auth()->user()->latestProducts;
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
        if (auth()->id() === $order->seller_user_id) {
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
        if (auth()->id() === $order->seller_user_id) {
            $order->status = 3;
            $order->save();

            try {
                Mail::to($order->buyer->preferred_communication->email_shipment)
                    ->send(new OrderStatusUpdateMail($order, 'shipped'));
            } catch (Exception $e) {
                return back()->withInput()->with('error', $e);
            }

            try {
                Mail::to($order->seller->preferred_communication->email_shipment)
                    ->send(new OrderStatusUpdateMail_seller($order, 'shipped'));
            } catch (Exception $e) {
                return back()->withInput()->with('error', $e);
            }

        } else {
            return redirect()->back()->withErrors('Order Status Update unsuccessful');
        }

        return redirect()->back()->with('message', 'Order Status Updated Successfully');
    }

    public function updateToDelivered(Order $order)
    {
        if (auth()->id() === $order->seller_user_id) {
            $order->status = 4;
            $order->save();

            try {
                Mail::to($order->buyer->preferred_communication->email_shipment)
                    ->send(new OrderStatusUpdateMail($order, 'delivered'));
            } catch (Exception $e) {
                return back()->withInput()->with('error', $e);
            }

        } else {
            return redirect()->back()->withErrors('Order Status Update unsuccessful');
        }

        return redirect()->back()->with('message', 'Order Status Updated Successfully');
    }

    public function updateToPickUp(Order $order)
    {
        if (auth()->id() === $order->seller_user_id) {
            $order->status = 6;
            $order->save();

            try {
                Mail::to($order->buyer->preferred_communication->email_shipment)
                    ->send(new OrderStatusUpdateMail($order, 'Ready to pickup'));
            } catch (Exception $e) {
                return back()->withInput()->with('error', $e);
            }

        } else {
            return redirect()->back()->withErrors('Order Status Update unsuccessful');
        }

        return redirect()->back()->with('message', 'Order Status Updated Successfully');
    }




    public function viewOrder(Order $order)
    {
        if (auth()->id() === $order->seller_user_id) {
            return view('pages.dashboards.view_seller_order', compact('order'));
        }

        return redirect()->back()->withErrors('You do not have permission to view this page');

    }

    public function viewOrderHistory()
    {
        $orders = auth()->user()->pastOrdersSeller()->paginate(20);
        return view('pages.orders.seller_order_history', compact('orders'));

    }
}

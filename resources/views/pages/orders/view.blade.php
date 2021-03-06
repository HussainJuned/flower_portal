@extends('layouts.master')
@section('title', 'Floral Portal')


@section('content')
    <div class="container">
        <h1>Order Id: {{ $order->id }}</h1>
        <p>Seller: {{ $order->seller->name }}</p>
        <p>Buyer: {{ $order->buyer->name }}</p>
        {{--<p>Product: {{ $order->product->name }}</p>
        <p>Order Date: {{ $order->order_date }}</p>
        <p>Status: {{ $order->statusToString() }}</p>
        <p>Shipping: {{ $order->shipping }}</p>
        <p>Zip: {{ $order->zip }}</p>--}}
    </div>
    <h4 class="text-align-center my-3">Order Id</h4>
    <h4 class="text-align-center my-3">Order Date</h4>
    <table>
        <thead>
        <tr>
            <th>Image</th>
            <th>Product</th>
            <th>Status</th>
            <th>Quantity</th>
        </tr>
        </thead>
    </table>
    @if ($order->status === 5 && auth()->id() === $order->buyer_user_id)
        <div class="container">
            @include('partials.product_review_box', ['product_id' => $order->product_id, 'order_id' => $order->id])
        </div>
    @endif
@endsection

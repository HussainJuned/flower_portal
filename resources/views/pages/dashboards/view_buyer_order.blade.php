@extends('layouts.master')
@section('title', 'View Order')


@section('content')
    <div class="container">
        <h1 class="my-5">Order Summary Page <small>(we can design it into a table later)</small></h1>
        <h3>Order Id: {{ $order->id }}</h3>
        <p>Seller:
            <a href="{{ route('userinfos.show', ['userinfo' => $order->seller->userinfo->id]) }}">
                {{ $order->seller->name }}</a>
            {{--@if ($order->status === 5 && auth()->id() === $order->buyer_user_id)
                <a href="{{ route('userinfos.show', ['userinfo' => $order->seller->userinfo->id]) }}" class="btn btn-primary">
                    Review seller Account</a>
            @endif--}}
        </p>
        <p>Buyer: <a href="{{ route('userinfos.show', ['userinfo' => $order->buyer->userinfo->id]) }}">
                {{ $order->buyer->name }}</a> (You) </p>
        <p>Product: {{ $order->product->name }}</p>
        <p>Order Date: {{ $order->order_date }}</p>
        <p>Status: {{ $order->statusToString() }}</p>
        <p>Shipping: {{ $order->shipping }}</p>
        <p>Zip: {{ $order->zip }}</p>
        <p>Quantity: {{ $order->quantity }}</p>
        <p>unit price: {{ $order->unit_price }}</p>
        <p>Total: {{ $order->total_price }}</p>
        @if ($order->productReview)
            <h4 class="mt-5 mb-3">Product Review</h4>
            <p><strong>Quantity: </strong> {{ $order->productReview->quality }}/5</p>
            <p><strong>Comment: </strong> {{ $order->productReview->comment }}</p>
        @endif
    </div>
    <div class="my-5 container">
        {{--@if ($order->status === 5 && auth()->id() === $order->buyer_user_id)
            <p>Go to: <a href="{{ route('userinfos.show', ['userinfo' => $order->seller->userinfo->id]) }}">
                    Review seller Account</a></p>
        @endif--}}
        <h4>Actions: </h4>
        @include('partials.buyer_order_prompt')
    </div>
@endsection
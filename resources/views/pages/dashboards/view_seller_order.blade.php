@extends('layouts.master')
@section('title', 'View Order')


@section('content')
    <div class="container">
        <h1 class="my-5">Order Summary Page <small>(we can design it into a table later)</small></h1>
        <h3>Order Id: {{ $order->id }}</h3>
        <p>Seller:
            <a href="{{ route('userinfos.show', ['userinfo' => $order->seller->userinfo->id]) }}">
                {{ $order->seller->name }}</a> (You) </p>
        <p>Buyer: <a href="{{ route('userinfos.show', ['userinfo' => $order->buyer->userinfo->id]) }}">
                {{ $order->buyer->name }}</a>
            @if ($order->status === 5 && auth()->id() === $order->seller_user_id)
                <a href="#" class="btn btn-primary"
                   data-toggle="modal" data-target="#exampleModal">
                    Review Buyer Account</a>
            @endif
        </p>
        @if ($order->status === 5 && \App\BuyerAccountReview::getBar($order->buyer_user_id, $order->seller_user_id)->first())
            <p> Buyer account review by you:
                {{ \App\BuyerAccountReview::getBar($order->buyer_user_id, $order->seller_user_id)->first()->quality }} / 5</p>
        @endif
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
        @if ($order->status === 5 && auth()->id() === $order->seller_user_id)
            <p>Go to: <a href="#"
                         data-toggle="modal" data-target="#exampleModal">
                    Review Buyer Account</a></p>
        @endif
        <h4>Actions: </h4>
        @include('partials.seller_order_prompt')
    </div>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Account Review</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="my-3">
                        @if ( $order->buyerAccountReview()->first())
                            @include('partials.buyer_review_box_value')
                        @else
                            @include('partials.buyer_review_box')
                        @endif

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
@endsection
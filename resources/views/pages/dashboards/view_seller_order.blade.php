@extends('layouts.master')
@section('title', 'View Order')


@section('content')
    <div class="container">
        <h1 class="my-5">Order Summary Page {{--<small>(we can design it into a table later)</small>--}}</h1>

        @if ($order->status === 5 && \App\BuyerAccountReview::getBar($order->buyer_user_id, $order->seller_user_id)->first())
            <p class="my-3"> Buyer account review by you:
                {{ \App\BuyerAccountReview::getBar($order->buyer_user_id, $order->seller_user_id)->first()->quality }} /
                5</p>
        @endif


        <div class="row my-5">
            <div class="col-sm-6">
                <p>Order Id: {{ $order->id }}</p>
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
            </div>
            <div class="col-sm-6">
                <p>Order Date: {{ $order->order_date }}</p>
                <p>Status: {{ $order->statusToString() }}</p>
                <p>Total: ${{ $order->order_total_price }}</p>
            </div>
        </div>

        {{--<p>Product: {{ $order->product->name }}</p>
        <p>Shipping: {{ $order->shipping }}</p>
        <p>Zip: {{ $order->zip }}</p>
        <p>Quantity: {{ $order->quantity }}</p>
        <p>unit price: {{ $order->unit_price }}</p>--}}

        <table class="table table-responsive table-striped od_table">
            <thead>
            <tr>
                <th>Image</th>
                <th>Product</th>
                <th>Quantity</th>
                <th>Total</th>
            </tr>
            </thead>
            <tbody>
            @foreach($order->orderProducts as $o_product)
                <tr>
                    <td class="tb_img"><img src="{{ asset('') }}{{ $o_product->product->photo_url }}"
                                            alt="product image" class="img-fluid"></td>
                    <td>{{ $o_product->product->name }}</td>
                    <td>1 x {{ $o_product->quantity }}</td>
                    <td>${{ $o_product->total_price }}</td>
                </tr>

            @endforeach
            </tbody>
        </table>

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
        @if ($order->status !== 5)
            <h4>Actions: </h4>
            @include('partials.summary_seller_order_prompt')
        @endif

    </div>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
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
                    <button type="button" class="btn my_account_btn dashboard-btn" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
@endsection

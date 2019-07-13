@extends('layouts.master')
@section('title', 'View Order')


@section('content')
    <div class="container">
        <h1 class="my-5">Order Details Page {{--<small>(we can design it into a table later)</small>--}}</h1>

        <div class="row mb-5">
            <div class="col-sm-6">
                <p><strong>Order Id:</strong> {{ $order->id }}</p>
                <p><strong>Seller:</strong>
                    <a href="{{ route('userinfos.show', ['userinfo' => $order->seller->userinfo->id]) }}">
                        {{ $order->seller->name }}</a>
                    {{--@if ($order->status === 5 && auth()->id() === $order->buyer_user_id)
                        <a href="{{ route('userinfos.show', ['userinfo' => $order->seller->userinfo->id]) }}" class="btn btn-primary">
                            Review seller Account</a>
                    @endif--}}
                </p>
                <p><strong>Buyer:</strong> <a href="{{ route('userinfos.show', ['userinfo' => $order->buyer->userinfo->id]) }}">
                        {{ $order->buyer->name }}</a> (You) </p>
                {{--        <p>Product: {{ $order->product->name }}</p>--}}

                {{--        <p>Shipping: {{ $order->shipping }}</p>--}}
                {{--        <p>Zip: {{ $order->zip }}</p>--}}
                {{--        <p>Quantity: {{ $order->quantity }}</p>--}}
                {{--        <p>unit price: {{ $order->unit_price }}</p>--}}
            </div>
            <div class="col-sm-6">
                <p><strong>Order Date:</strong> {{ $order->order_date }}</p>
                <p><strong>Status:</strong> {{ $order->statusToString() }}</p>
                <p><strong>Total:</strong> ${{ $order->order_total_price }}</p>
            </div>
        </div>

        {{--<table>
            <tr>
                <th>Order Id:</th>
                <td>{{ $order->id }}</td>
                <th>Seller</th>
                <td><a href="{{ route('userinfos.show', ['userinfo' => $order->seller->userinfo->id]) }}">
                        {{ $order->seller->name }}</a></td>
            </tr>
        </table>--}}

        <div class="row my-5 outstanding_invoice">
            <div class="col-sm-12">
                <h3 class="mb-3"><span class="ii"><i class="fas fa-file-invoice"></i></span>Invoices</h3>
                <div class="oi_container">
                    <div class="oi_box">
                        <h5>Before You Continue Shopping, Please make a payment</h5>

                        <p class="inp">Total amount due before you can continue shopping(including transaction costs:
                            <strong>${{ $invoice->amount }}</strong>
                        </p>

                        <a href="" class="btn btn_op">Pay</a>
                        <a href="{{ route('pdf.invoice.outstanding', ['invoice' => $invoice->id]) }}" class="btn btn_gop">Generate PDF</a>
                    </div>

                    <div class="oi_box">
                        <h5>Outstanding Invoices</h5>

                        <div class="table-responsive">
                            <table class="oi_t table">
                                <thead>
                                <tr>
                                    <th>Date of Invoice</th>
                                    <th>Invoice ID</th>
                                    <th>Buyer ID</th>
                                    <th>Delivery Date</th>
                                    <th>Currency</th>
                                    <th>Amount</th>
                                    <th>Paid</th>
                                    <th>Outstanding</th>
                                    <th>Age of Invoice</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>{{ date('d/m/Y', strtotime($invoice->created_at)) }}</td>
                                    <td>{{ $invoice->id }}</td>
                                    <td>{{ $invoice->user_id }}</td>
                                    <td>{{ $invoice->due_date }}</td>
                                    <td>{{ $invoice->currency }}</td>
                                    <td>${{ $invoice->amount }}</td>
                                    <td>{{ $invoice->paid }}</td>
                                    <td>${{ $invoice->outstanding }}</td>
                                    <td>{{ \Carbon\Carbon::parse($invoice->created_at)->diffInDays(\Carbon\Carbon::today()) + 1 }}</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>


                </div>
            </div>

            <div class="col-sm-6">
            </div>

        </div>

        <div class="table-responsive">
            <table class="table table-striped od_table">
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
        </div>

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

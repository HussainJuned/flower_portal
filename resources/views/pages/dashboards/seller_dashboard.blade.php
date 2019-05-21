@extends('layouts.master')
@section('title', 'Seller Dashboard')


@section('content')
    <div class="container">
        <h2>Seller Dashboard</h2>
        <h2>Welcome Back {{ auth()->user()->name }}</h2>
        <div class="my-5">
            <h1>Upcoming orders</h1>
            @if(count($upcoming_orders) > 0)
                <table class="table">
                    <thead>
                    <tr>
                        <td scope="col">Date</td>
                        <td scope="col">Buyer</td>
                        <td scope="col">Quantity</td>
                        <td scope="col">Unit Price</td>
                        <td scope="col">Total</td>
                        <td scope="col">Status</td>
                        <td scope="col">Product Review</td>
                        <td scope="col">Action</td>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($upcoming_orders as $order)
                        <tr scope="row">
                            <td>{{ $order->order_date }}</td>
                            <td>{{ $order->buyer->name }}</td>
                            <td>{{ $order->quantity }}</td>
                            <td>{{ $order->unit_price }}</td>
                            <td>{{ $order->total_price }}</td>
                            <td>{{ $order->statusToString() }}</td>
                            <td>@if ($order->productReview)
                                    {{ $order->productReview->quality }} / 5
                                @else
                                    n/a
                                @endif
                            </td>
                            <td><a href="{{ route('seller_dashboard.order.view', ['order' => $order->id]) }}"
                                   class="btn btn-primary">view</a>
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#ur_{{ $order->id }}">
                                    edit
                                </button>

                                <!-- Modal -->
                                <div class="modal fade" id="ur_{{ $order->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Edit Status</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="my-3">
                                                    @include('partials.seller_order_prompt')
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach

                    </tbody>
                </table>

            @else
                <h4> You have no upcoming orders </h4>
            @endif

        </div>
        <div class="my-5">
            <h1>Past orders</h1>
            @if(count($past_orders) > 0)
                <table class="table">
                    <thead>
                    <tr>
                        <td scope="col">Date</td>
                        <td scope="col">Buyer</td>
                        <td scope="col">Quantity</td>
                        <td scope="col">Unit Price</td>
                        <td scope="col">Total</td>
                        <td scope="col">Status</td>
                        <td scope="col">Product Review</td>
                        <td scope="col">Action</td>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($past_orders as $order)
                        <tr scope="row">
                            <td>{{ $order->order_date }}</td>
                            <td>{{ $order->buyer->name }}</td>
                            <td>{{ $order->quantity }}</td>
                            <td>{{ $order->unit_price }}</td>
                            <td>{{ $order->total_price }}</td>
                            <td>{{ $order->statusToString() }}</td>
                            <td>
                                @if ($order->productReview)
                                    {{ $order->productReview->quality }} / 5
                                @else
                                    n/a
                                @endif
                            </td>
                            <td><a href="{{ route('seller_dashboard.order.view', ['order' => $order->id]) }}"
                                   class="btn btn-primary">view</a>
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#po_{{ $order->id }}">
                                    edit
                                </button>

                                <!-- Modal -->
                                <div class="modal fade" id="po_{{ $order->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Edit Status</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="my-3">
                                                    @include('partials.seller_order_prompt')
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach

                    </tbody>
                </table>
                <p class="my-3"> {{ $past_orders->links() }}</p>
            @else
                <h4> You have no past orders </h4>
            @endif

        </div>
    </div>
@endsection

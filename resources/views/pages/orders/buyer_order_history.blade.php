@extends('layouts.master')
@section('title', 'Floral Portal')


@section('content')


    <div class="my-5 container">
        <h1>Order History</h1>
        @if(count($orders) > 0)
            <table class="table">
                <thead>
                <tr>
                    <td scope="col">Date</td>
                    {{--<td scope="col">Product</td>
                    <td scope="col">Quantity</td>
                    <td scope="col">Unit Price</td>--}}
                    <td scope="col">Status</td>
                    <td scope="col">Seller</td>
                    <td scope="col">Total Price</td>
                    {{--                        <td scope="col">Review</td>--}}
                    <td scope="col">Action</td>
                </tr>
                </thead>
                <tbody>
                @foreach ($orders as $order)
                    <tr scope="row">
                        <td>{{ $order->order_date }}</td>
                        {{--                            <td>{{ $order->product->name }}</td>--}}
                        {{--                            <td>{{ $order->quantity }}</td>--}}
                        {{--                            <td>{{ $order->unit_price }}</td>--}}
                        <td>{{ $order->statusToString() }}</td>
                        <td>{{ $order->seller->name }}</td>
                        <td>{{ $order->order_total_price }}</td>
                        {{--<td>
                            @if ($order->productReview)
                                {{ $order->productReview->quality }} / 5
                            @else
                                n/a
                            @endif
                        </td>--}}
                        <td><a href="{{ route('buyer_dashboard.order.view', ['order' => $order->id]) }}"
                               class="btn btn-primary">view</a>
                            <!-- Button trigger modal -->
                        {{--<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#bpo_{{ $order->id }}">
                            edit
                        </button>--}}

                        <!-- Modal -->
                            <div class="modal fade" id="bpo_{{ $order->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                                @include('partials.buyer_order_prompt')
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
            <p class="my-3"> {{ $orders->links() }}</p>

        @else
            <h4> You have no past orders </h4>
        @endif

    </div>


@endsection

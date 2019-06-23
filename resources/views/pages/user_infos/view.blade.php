@extends('layouts.master')
@section('title', 'Profile Information')


@section('content')

    <div class="container">
        <h2 class="mb-30">User Info</h2>
        <div class="row">
            <div class="col-sm-6">
                {{--<p> Username: {{ $userinfo->user->name }}</p>
                <p> Email: {{ $userinfo->user->email }}</p>
                <p> Name: {{  $userinfo->title }} {{ $userinfo->first_name }} {{ $userinfo->last_name }}</p>
                --}}{{--<p> Title: {{ $userinfo->title }}</p>
                <p> First Name: {{ $userinfo->first_name }}</p>
                <p> Last Name: {{ $userinfo->last_name }}</p>--}}{{--
                <p> Company Name: {{ $userinfo->company_name }}</p>
                <p> Business Type: {{ $userinfo->business_type }}</p>
                <p> Language: {{ $userinfo->language }}</p>--}}

                <table class="table table-striped">
                    <tr>
                        <th>Username</th>
                        <td>{{ $userinfo->user->name }}</td>
                    </tr>
                    <tr>
                        <th>Email</th>
                        <td>{{ $userinfo->user->email }}</td>
                    </tr>
                    <tr>
                        <th>Name</th>
                        <td>{{ $userinfo->title }} {{ $userinfo->first_name }} {{ $userinfo->last_name }}</td>
                    </tr>
                    <tr>
                        <th>Company Name</th>
                        <td>{{ $userinfo->company_name }}</td>
                    </tr>
                    <tr>
                        <th>Business Type</th>
                        <td>{{ $userinfo->business_type }}</td>
                    </tr>
                    <tr>
                        <th>Language</th>
                        <td>{{ $userinfo->language }}</td>
                    </tr>
                    <tr>
                        <th>Country</th>
                        <td>{{ $userinfo->country }}</td>
                    </tr>
                    <tr>
                        <th>Telephone</th>
                        <td>{{ $userinfo->telephone }}</td>
                    </tr>

                </table>
            </div>
            <div class="col-sm-6">
                {{--<p> Country: {{ $userinfo->country }}</p>
                <p> state: {{ $userinfo->state }}</p>
                <p> city: {{ $userinfo->city }}</p>
                <p> delivery_address_1: {{ $userinfo->delivery_address_1 }}</p>
                <p> delivery_address_2: {{ $userinfo->delivery_address_2 }}</p>
                <p> zip: {{ $userinfo->zip }}</p>
                <p> telephone: {{ $userinfo->telephone }}</p>
                @if ($userinfo->fax)
                    <p> Fax: {{ $userinfo->fax }}</p>
                @endif
                @if ($userinfo->website)
                    <p> Website:
                        <a target="_blank" href="https://{{ $userinfo->website }}">{{ $userinfo->website }}</a></p>
                @endif--}}
                <table class="table table-striped">
                    <tr>
                        <th>Address 1</th>
                        <td>{{ $userinfo->delivery_address_1 }}</td>
                    </tr>
                    <tr>
                        <th>Address 2</th>
                        <td>{{ $userinfo->delivery_address_2 }}</td>
                    </tr>
                    <tr>
                        <th>State</th>
                        <td>{{ $userinfo->state }}</td>
                    </tr>
                    <tr>
                        <th>City</th>
                        <td>{{ $userinfo->city }}</td>
                    </tr>
                    <tr>
                        <th>Zip</th>
                        <td>{{ $userinfo->zip }}</td>
                    </tr>

                    @if ($userinfo->fax)
                        <tr>
                            <th>Fax</th>
                            <td>{{ $userinfo->fax }}</td>
                        </tr>
                    @endif
                    @if ($userinfo->website)
                        <tr>
                            <th>Website</th>
                            <td><a target="_blank" href="https://{{ $userinfo->website }}">{{ $userinfo->website }}</a></td>
                        </tr>
                    @endif
                </table>
            </div>
        </div>

        <h2 class="mb-30 mt-5">All Available Products (which has status active and available_date_end not smaller than
            today)</h2>
        @if (!$userinfo->user->isSeller())
            <p> This User Has Not any product to show</p>

        @else
            <div class="row">
                @foreach($userinfo->user->availableProducts()->get() as $product)
                    <div class="col-sm-6 mb-3">
                        @include('partials.product_box')
                    </div>
                @endforeach
            </div>

        @endif

        <h2 class="mb-30">Reviews</h2>
        <div class="row">
            <div class="col-sm-6 mb-3">
                <h4>Seller Account</h4>
                @if ($userinfo->user->products()->first())
                    @foreach($userinfo->user->products as $product)
                        @if ($product->reviews()->first())
                            @foreach($product->reviews as $review)
                                <div class="mb-3">
                                    <div class="card p-3">
                                        <p>Buyer name: {{ $review->order->buyer->name }}</p>
                                        <p>Rating: {{ $review->quality }} / 5</p>
                                        <p>comment: {{ $review->comment }}</p>
                                    </div>
                                </div>
                            @endforeach
                        @endif

                    @endforeach
                @endif
            </div>

            <div class="col-sm-6 mb-3">
                <h4>Buyer Account</h4>
                @if ($userinfo->user->buyerAccountReviews)
                    @foreach($userinfo->user->buyerAccountReviews as $review)
                        <div class="mb-3">
                            <div class="card p-3">
                                <p>Seller name: {{ $review->getSeller->name }}</p>
                                <p>Rating: {{ $review->quality }} / 5</p>
                                <p>comment: {{ $review->comment }}</p>
                            </div>
                        </div>
                    @endforeach
                @else
                    <p> No Review</p>
                @endif
            </div>


        </div>

    </div>

@endsection

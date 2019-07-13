@extends('layouts.master')
@section('title', 'Product Info')


@section('content')

    <div class="container">
        <h2 class="mb-30 text-center mt-5">Product Info</h2>
        <div class="row mb-3" id="product">
            <div class="col-sm-7 mb-3 text-center">
                <a href="{{ route('userinfos.show', ['userinfo' => $product->user->userinfo->id]) }}">
                    <figure class="product_fig">
                        <img src="{{ url('/') }}/{{ $product->photo_url }}" class="img-fluid"
                             id="{{$product->user->name}}-product-id-{{$product->id}}"
                             alt="Image Loading Failed"/>
                        <figcaption>View Profile</figcaption>
                    </figure>
                </a>
            </div>
            <div class="col-sm-5 mb-3">
                <h5 class="mb-30">
                    <strong>Title: {{ $product->name }}</strong>
                </h5>
                <div class="row">
                    <div class="col-sm-12 mb-30">
                        {{--<p>Sold By: {{ $product->pack }}</p>
                        <p>Description: {{ $product->description }}</p>
                        <p>Stem in Bunch: {{ $product->number_of_stem }}</p>
                        <p>Stem price: {{ $product->price_per_stem_bunch }}</p>
                        <p>Price: {{ $product->price }}</p>--}}
                        <p class="mb-5"><strong>Description:</strong> {{ $product->description }}</p>
                        <div class="grower"><b>Grower:</b><span>{{ $product->grower }}</span></div>

                        <ul class="specs" id="alle-kenmerken">
                            <li><span>Sold By:</span> <span>{{ $product->pack }}</span></li>
{{--                            <li><span>Description:</span> <span>{{ $product->description }}</span></li>--}}
                            <li><span>Stock:</span> <span>{{ $product->stock }}</span></li>
                            <li><span>Colour:</span> <span><span style="background: {{ $product->colour }}" class="rcs"></span></span>
                            </li>
                            <li><span>Stem in Bunch: </span> <span>{{ $product->number_of_stem }} </span></li>
                            <li><span>Stem price:</span> <span>${{ $product->price_per_stem_bunch }}</span></li>
                            <li><span>Price:</span> <span>${{ $product->price }} </span></li>
                            <li><span>Length</span> <span>{{ $product->height }} </span></li>
                            <li><span>Origin:</span> <span>{{ $product->origin }} </span></li>
                            <li><span>Category:</span> <span>{{ $product->categoryR->name }} </span></li>
                            <li><span>Status:</span> <span>{{ $product->statusToStr() }} </span></li>
                        </ul>
                    </div>
                    <div class="col-sm-6 mb-3">
                        {{--<p>Origin: {{ $product->origin }}</p>
                        <p>Height: {{ $product->height }}</p>
                        <p>Colour: <span style="background: {{ $product->colour }}" class="rcs"></span></p>
                        <p>Category: {{ $product->categoryR->name }}</p>
                        <p>Stock: {{ $product->stock }}</p>
                        <p>Available Dates:
                        </p>
                        <ul class="list-group av_dates">
                            @foreach ($product->availableDates() as $ad)
                                <li class="list-group-item">{{ $ad }}</li>
                            @endforeach
                        </ul>--}}

                    </div>
                </div>
                <h2 class="mb-30 mt-5">Reviews</h2>

                @if ($product->reviews->first())
                    <div class="row">
                        @foreach($product->reviews as $review)
                            <div class="col-sm-6 mb-3">
                                <div class="mb-3">
                                    <div class="card p-3">
                                        <p>Buyer name: {{ $review->order->buyer->name }}</p>
                                        <p>Rating: {{ $review->quality }} / 5</p>
                                        <p>comment: {{ $review->comment }}</p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @else
                    <p class="text-center">No review yet</p>
                @endif

                @if (auth()->user()->products->contains('id', $product->id))
                    <p>
                        <a href="{{ route('products.edit', ['product' => $product->id]) }}" class="btn btn-primary">
                            Modify Product
                        </a>
                    </p>
                @else
                    {{--<form action="{{ route('order.store', ['product' => $product->id]) }}" method="post">
                        @csrf
                        <div class="form-group my-3">
                            <label for="quantity">Quantity</label>
                            <input required type="number"
                                   class="{{ $errors->has('quantity') ? ' is-invalid' : '' }}"
                                   min="1" max="100" step="1"
                                   id="quantity" name="quantity" value="1">
                            @if ($errors->has('quantity'))
                                <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('quantity') }}</strong>
                        </span>
                            @endif
                        </div>
                        <p>Total price:
                            <strong class="total_price">js work needed</strong>
                        </p>
                        <div class="form-group my-3">
                            <label for="order_date">Choose in which date you want to order</label>
                            <select class="" id="order_date" name="order_date" required>
                                @if(old('order_date', null) != null)
                                    <option selected value="{{ old('order_date') }}">{{ old('order_date') }}</option>
                                @endif
                                @if($product->availableDates())
                                    @foreach($product->availableDates() as $order_date)
                                        <option value="{{ $order_date }}">{{ $order_date }}</option>
                                    @endforeach
                                @else
                                    <option value="false">not available</option>
                                @endif

                            </select>
                            @if ($errors->has('order_date'))
                                <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('order_date') }}</strong>
                            </span>
                            @endif
                        </div>
                        @if($product->availableDates())
                            <button type="submit" class="btn btn-primary">Order</button>
                        @else
                            <button type="button" class="btn btn-primary" disabled>Not Available</button>
                        @endif
                    </form>--}}
                @endif
            </div>
        </div>
    </div>

@endsection

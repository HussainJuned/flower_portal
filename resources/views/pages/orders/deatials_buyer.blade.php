@extends('layouts.master')
@section('title', 'Floral Portal')


@section('content')
    <div class="my-3 shopping-cart order_details_page">

        <form action="{{ route('order.bulkStore') }}" id="card_order_form">
            @foreach($products as $index => $product)
                <section class="item">
                    {{--<div class="buttons">
                        <span class="delete-btn"></span>
                        <span class="like-btn"></span>
                    </div>--}}

                    <div class="image">
                        <img class="img-fluid" src="{{ asset($product->photo_url) }}" alt="product photo"/>
                    </div>

                    <div class="description">
                        <span>{{ $product->name }}</span>
                        <span>{{ $product->stock }} in stock</span>
{{--                        <span>Delivery Date: </span>--}}
                    </div>

                    <div class="quantity">

                        {{--<button class="plus-btn" type="button" name="button" >
                            <img src="{{ asset('images/icons/plus.svg') }}" alt="+"/>
                        </button>--}}
                        <input type="text" name="a_quantity[]" value="{{ $quantity[$index] }}" class="q" disabled>
                        <input type="text" name="quantity[]" value="{{ $quantity[$index] }}" class="q" hidden>
                        {{--<button class="minus-btn" type="button" name="button">
                            <img src="{{ asset('images/icons/minus.svg') }}" alt="-"/>
                        </button>--}}
                        {{--<div class="delivery_date">
                            <span>{{ $order_date[$index] }}</span>
                            <input type="text" name="order_date[]" value="{{ $order_date[$index] }}" class="q" hidden>
                        </div>--}}

                    </div>

                    <div>

                    </div>


                    {{--            <div class="total-price">$ <span class="price_value" v-bind:data-price="$product.price">@{{ $product.price }}</span> </div>--}}
                </section>
            @endforeach
            @csrf
        </form>

    </div>
@endsection

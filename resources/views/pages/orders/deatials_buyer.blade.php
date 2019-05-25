@extends('layouts.master')
@section('title', 'Floral Portal')


@section('content')
    <div class="my-3 shopping-cart order_details_page">
        <h4 class="text-center mt-3">Delivery Date: <span>{{ $delivery_date }}</span> </h4>
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

                    {{--<div>

                    </div>--}}


                    {{--            <div class="total-price">$ <span class="price_value" v-bind:data-price="$product.price">@{{ $product.price }}</span> </div>--}}
                </section>
            @endforeach
            @csrf
            <div class="my-3 text-center">
                <div class="form-group mb-30">
                    <label for="purchase_order_name">Purchase Order Name</label>
                    <input type="text" class="form-control{{ $errors->has('purchase_order_name') ? ' is-invalid' : '' }}"
                           value="{{ old('purchase_order_name') }}"
                           id="purchase_order_name" name="purchase_order_name" placeholder="e.g. For Donald Trump">
                    @if ($errors->has('purchase_order_name'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('purchase_order_name') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="form-group mb-30">
                    <label for="delivery_option">Delivery Option</label>
                    <select class="form-control" id="delivery_option" name="delivery_option" required>
                        @if(old('delivery_option', null) != null)
                            <option selected value="{{ old('delivery_option') }}">{{ old('delivery_option') }}</option>
                        @endif
                        <option value="pick_up">Pick Up</option>
                        <option value="delivery">Delivery</option>
                    </select>
                </div>

                <div class="delivery_container" style="display: none">
                    <div class="form-group mb-30">
                        <label for="delivery_address_id">Delivery Address</label>
                        <select class="form-control" id="delivery_address_id" name="delivery_address_id">
                            @if(old('delivery_address_id', null) != null)
                                <option selected value="{{ old('delivery_address_id') }}">{{ old('delivery_address_id') }}</option>
                            @endif
                            <option value="pick_up">Address 1</option>
                            <option value="delivery">Address 2</option>
                        </select>
                    </div>

                    <div class="buyer_address_show">

                    </div>

                    <div class="form-group mb-30">
                        <a href="">Add new address</a>
                    </div>
                </div>



                <input type="submit" class="btn btn-primary" value="Order Now">
            </div>
        </form>

    </div>
@endsection

@push('footer-js')

    <script type="text/javascript">
        $('#delivery_option').on('change', function (e) {
           if ($(this).val() == 'delivery') {
               $('.delivery_container').show();
           } else {
               $('.delivery_container').hide();
           }
        });
    </script>

    @endpush

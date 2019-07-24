@extends('layouts.master')
@section('title', 'Floral Portal')


@section('content')
    <div class="my-3 shopping-cart order_details_page">
        <h4 class="text-center mt-3">Delivery Date: <span>{{ $delivery_date }}</span></h4>
        <form action="{{ route('order.bulkStore') }}" id="card_order_form" method="post">
            @foreach($products as $index => $product)
                <section class="item">
                    <div class="buttons">
                        <span class="delete-btn"></span>
                        <span class="like-btn"></span>
                    </div>

                    <div class="image">
                        <img class="img-fluid" src="{{ asset($product->photo_url) }}" alt="product photo"/>
                    </div>

                    <div class="description">
                        <span>{{ $product->name }}</span>
                        <span>{{ $product->stock }} in stock</span>
                                                {{-- <span>Delivery Date: </span> --}}
                    </div>

                    <div class="quantity">

                        <button class="plus-btn-new" type="button" name="button" >
                            <img src="{{ asset('images/icons/plus.svg') }}" alt="+"/>
                        </button>
                        <input type="text" name="a_quantity[]" value="{{ $quantity[$index] }}" class="q a_quantity" disabled max="{{ $product->stock }}">
                        <input type="text" name="quantity[]" value="{{ $quantity[$index] }}" class="q a_quantity" hidden> 
                        <input type="text" name="product_id[]" value="{{ $product->id }}" hidden>
                        <button class="minus-btn-new" type="button" name="button">
                            <img src="{{ asset('images/icons/minus.svg') }}" alt="-"/>
                        </button>
                        <div class="delivery_date">
                            <span>{{ $order_date[$index] }}</span>
                            <input type="text" name="order_date[]" value="{{ $order_date[$index] }}" class="q" hidden>
                        </div>
                    </div>
                    <div>
                    </div>
 
                     <div class="total-price">$ <span class="price_value" {{-- v-bind:data-price="product.price" --}} data-price="{{ $product->price }}">{{ $product->price }}</span> </div>
                </section>
            @endforeach
            @csrf
            <div class="my-3 text-center">
                <div class="form-group mb-30">
                    <label for="purchase_order_name">Purchase Order Name</label>
                    <input type="text"
                           class="form-control{{ $errors->has('purchase_order_name') ? ' is-invalid' : '' }}"
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
                                <option selected
                                        value="{{ old('delivery_address_id') }}">{{ old('delivery_address_id') }}</option>
                            @endif
                            @foreach (auth()->user()->buyerAddresses as $index => $address)
                                    <option value="{{ $address->id }}">Address {{ $index+1 }}</option>
                            @endforeach
                            <option value="new">New Address</option>
                        </select>
                    </div>

                    <div class="buyer_address_show">

                            <div class="row">
                                <div class="form-group mb-30 col-md-6">
                                    <label for="country1">Country</label>
                                    <input disabled list="country" name="country" id="country1"
                                           class="form-control{{ $errors->has('country') ? ' is-invalid' : '' }}"
                                           value="{{ auth()->user()->buyerAddresses[0]->country }}">
                                    <datalist id="country">
                                        @include('partials.all_country_options')
                                    </datalist>
                                    @if ($errors->has('country'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('country') }}</strong>
                                         </span>
                                    @endif
                                </div>

                                <div class="form-group mb-30 col-md-6">
                                    <label for="state">State</label>

                                    <input disabled type="text"
                                           class="form-control{{ $errors->has('state') ? ' is-invalid' : '' }}"
                                           value="{{ auth()->user()->buyerAddresses[0]->state }}"
                                           id="state" name="state" placeholder="e.g. New York">
                                    @if ($errors->has('state'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('state') }}</strong>
                                        </span>
                                    @endif
                                </div>

                                <div class="form-group mb-30 col-md-6">
                                    <label for="city">City</label>

                                    <input disabled type="text"
                                           class="form-control{{ $errors->has('city') ? ' is-invalid' : '' }}"
                                           value="{{ auth()->user()->buyerAddresses[0]->city }}"
                                           id="city" name="city" placeholder="e.g. Dunkirk">
                                    @if ($errors->has('city'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('city') }}</strong>
                                        </span>
                                    @endif
                                </div>

                                <div class="form-group mb-30 col-md-6">
                                    <label for="delivery_address_1">Address
                                    </label>

                                    <input disabled type="text"
                                           class="form-control{{ $errors->has('delivery_address_1') ? ' is-invalid' : '' }}"
                                           value="{{ auth()->user()->buyerAddresses[0]->delivery_address_1 }}"
                                           id="delivery_address_1" name="delivery_address_1"
                                           placeholder="Enter Your Address Here">
                                    @if ($errors->has('delivery_address_1'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('delivery_address_1') }}</strong>
                                        </span>
                                    @endif

                                </div>

                                <div class="form-group mb-30 col-md-6">
                                    <label for="delivery_address_2">
                                        Address Line 2
                                    </label>

                                    <input disabled type="text"
                                           class="form-control{{ $errors->has('delivery_address_2') ? ' is-invalid' : '' }}"
                                           value="{{ auth()->user()->buyerAddresses[0]->delivery_address_2 }}"
                                           id="delivery_address_2" name="delivery_address_2"
                                           placeholder="Continue Entering Your Address Here If No Space In Above Field">
                                    @if ($errors->has('delivery_address_2'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('delivery_address_2') }}</strong>
                                        </span>
                                    @endif
                                </div>

                                <div class="form-group mb-30 col-md-6">
                                    <label for="zip">Zip</label>

                                    <input disabled type="text"
                                           class="form-control{{ $errors->has('zip') ? ' is-invalid' : '' }}"
                                           value="{{ auth()->user()->buyerAddresses[0]->zip }}"
                                           id="zip" name="zip" placeholder="e.g. 14048">
                                    @if ($errors->has('zip'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('zip') }}</strong>
                                        </span>
                                    @endif

                                </div>

                                <div class="form-group mb-30 col-md-6">
                                    <label for="suite">Suite</label>

                                    <input disabled type="text"
                                           class="form-control{{ $errors->has('suite') ? ' is-invalid' : '' }}"
                                           value="{{ auth()->user()->buyerAddresses[0]->suite }}"
                                           id="suite" name="suite" placeholder="e.g. 14048">
                                    @if ($errors->has('suite'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('suite') }}</strong>
                                        </span>
                                    @endif
                                </div>

                                <div class="form-group mb-30 col-md-6">
                                    <label for="buzzer">Buzzer</label>

                                    <input disabled type="text"
                                           class="form-control{{ $errors->has('buzzer') ? ' is-invalid' : '' }}"
                                           value="{{ auth()->user()->buyerAddresses[0]->buzzer }}"
                                           id="buzzer" name="buzzer" placeholder="e.g. 14048">
                                    @if ($errors->has('buzzer'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('buzzer') }}</strong>
                                        </span>
                                    @endif

                                </div>

                            </div>

                    </div>
                </div>

                <input type="date" name="delivery_date" value="{{ \Carbon\Carbon::parse($delivery_date)->toDateString() }}" hidden>
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

        var country = $('#country1');
        var state = $('#state');
        var city = $('#city');
        var delivery_address_1 = $('#delivery_address_1');
        var delivery_address_2 = $('#delivery_address_2');
        var zip = $('#zip');
        var suite = $('#suite');
        var buzzer = $('#buzzer');

        $('#delivery_address_id').on('change', function (e) {

            if($(this).val() === 'new') {
                $('#card_order_form input').each(function (e) {
                    $(this).prop('disabled', false);
                });
            } else {
                var address_id = $(this).val();

                $.ajax({

                    url : '{{ route('api.buyer.addresses') }}',
                    type : 'GET',
                    data : {
                        'address_id' : address_id
                    },
                    dataType:'json',
                    success : function(data) {
                        country.val(data.country);
                        state.val(data.state);
                        city.val(data.city);
                        delivery_address_1.val(data.delivery_address_1);
                        delivery_address_2.val(data.delivery_address_2);
                        zip.val(data.zip);
                        suite.val(data.suite);
                        buzzer.val(data.buzzer);
                    },
                    error : function(request,error)
                    {
                        alert("Request: "+JSON.stringify(request));
                    }
                });
            }

        });

          $(document).on('click', '.minus-btn-new', function(e) {
                e.preventDefault();
                var $this = $(this);
                var $input = $this.closest('div').find('input.a_quantity');

                var $price = $this.closest('section').find('.price_value');
                var price_value = parseFloat($price.attr('data-price'));
                 var value = parseInt($input.val());

                if (value > 1) {
                    value = value - 1;
                } else {
                    value = 1;
                }

                $input.val(value);

                var cal_total = (value * price_value);
                cal_total = cal_total.toFixed(2);
                $price.text(cal_total);

            });

            $('.shopping-cart').on('click', '.plus-btn-new', function(e) {
                e.preventDefault();

                var $this = $(this);
                var $input = $this.closest('div').find('input.a_quantity');

                var $price = $this.closest('section').find('.price_value');
                var price_value = parseFloat($price.attr('data-price'));

                var value = parseInt($input.val());
                var max = parseInt($input.attr('max'));

                if (value < max) {
                    value = value + 1;
                } else {
                    value =max;
                }

                $input.val(value);
                var cal_total = (value * price_value);
                cal_total = cal_total.toFixed(2);
                $price.text(cal_total);
            });

 


    </script>

@endpush

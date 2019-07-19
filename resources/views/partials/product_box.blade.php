<li class="product-col">
        <div class="product">
            <a href="{{ route('userinfos.show', ['userinfo' => $product->user->userinfo->id]) }}">
                <div class="images">
                    <div class="image">
                        <div class="img"
                             style="background-image: url({{ url('/') }}/{{ $product->photo_url }}) "></div>
                    </div>
                </div>
                <div class="specs">
                    <ul class="clearfix">
                        <li><span>Sold By:</span> <span>{{ $product->pack }}</span></li>
                        <li><span>Total Stem:</span> <span>{{ $product->number_of_stem }}</span></li>
                        <li><span>Length:</span><span> {{ $product->height }} </span></li>
                        <li><span>Stock:</span> <span>{{ $product->stock }}</span></li>
                        <li><span>Colour:</span> <span style="background: {{$product->colour}}" class="rcs"></span></li>
                        <li><span style="width: 100%" class="availability"> Available from stock
                                <div
                                    class="product-status @if ($product->status)
                                        green
                                    @endif"
                                >
                                </div>
                            </span>
                        </li>
                    </ul>
                </div>  

                  <div class="info exclusive">
                    @if ($product->feature === 1)
                        <div class="product-label exclusive">SPECIAL</div>
                    @endif
                    @if ($product->feature === 2)
                            <div class="product-label exclusive">LOW PRICE</div>
                    @endif
                    @if ($product->feature === 3)
                            <div class="product-label exclusive">EXCLUSIVE</div>
                    @endif
                    @if ($product->feature === 4)
                            <div class="product-label exclusive">LIMITED</div>
                    @endif


                    <h6>{{ $product->name }}</h6>
                    <div class="price-info">

                            <span class="price">$ {{ explode(".", $product->price_per_stem_bunch)[0] }}<sup> {{ explode(".", $product->price_per_stem_bunch)[1] }}</sup>
                               <!--<div class="add_to_cart">
                                    <i class="fas fa-plus"></i>
                                </div>  -->
                            </span>
                        <span class="each">Price per stem</span>
                    </div>
                </div>  
            </a>
        </div>
    </li>


{{-- 
<div class="card p-5 product_box my-5">
    <div class="row mb-3">
        <div class="col-sm-6 mb-3">
            <a href="{{ route('userinfos.show', ['userinfo' => $product->user->userinfo->id]) }}">
                <figure>
                    <img src="{{ url('/') }}/{{ $product->photo_url }}" class="img-fluid"
                         id="{{$product->user->name}}-product-id-{{$product->id}}"
                         alt="Image Loading Failed"/>
                    <figcaption>View Profile</figcaption>
                </figure>
            </a>
        </div>
        <div class="col-sm-6 mb-3">
            <h5>
                <strong>{{ $product->name }}</strong>
            </h5>
            <p>Sold By: {{ $product->pack }}</p>
            <p>Stem in Bunch: {{ $product->number_of_stem }}</p>
            <p>Stem price: {{ $product->price_per_stem_bunch }}</p>
            <p>Price: {{ $product->price }}</p>
            @if ($product->review)
                <p>Reviews: ({{ round($product->reviewsAvg->first()->avg_quality, 2) }} / 5)</p>
            @else
                <p>Reviews: no review yet</p>
            @endif

            <p>
                <a href="{{ route('products.show', ['product' => $product->id]) }}" class="btn my_account_btn p-0">View Full Details</a>
            </p>
            @auth
                @if (auth()->user()->products->contains('id', $product->id))
                <p>
                    <a href="{{ route('products.edit', ['product' => $product->id]) }}" class="btn my_account_btn">Modify Product</a>
                </p>
                @else
                    <p>
                    <form action="{{ route('order.store', ['product' => $product->id]) }}" method="post">
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
                        <p>Total price: <strong class="total_price">js work needed</strong></p>
                        <div class="form-group my-3">
                            <label for="order_date">Choose in which date you want to order</label>
                            <select class="form-control" id="order_date" name="order_date" required>
                                @if(old('order_date', null) != null)
                                    <option selected value="{{ old('order_date') }}">{{ old('order_date') }}</option>
                                @endif
                                @foreach($product->availableDates() as $order_date)
                                    <option value="{{ $order_date }}">{{ $order_date }}</option>
                                @endforeach
                            </select>
                            @if ($errors->has('order_date'))
                                <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('order_date') }}</strong>
                            </span>
                            @endif
                        </div>
                        <button type="submit" class="btn my_account_btn dashboard-btn">Order</button>
                    </form>
                    </p>
                @endif
            @else
                <p>
                    <form action="{{ route('order.store', ['product' => $product->id]) }}" method="post">
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
                <p>Total price: <strong class="total_price">js work needed</strong></p>
                <div class="form-group my-3">
                    <label for="order_date">Choose in which date you want to order</label>
                    <select class="form-control" id="order_date" name="order_date" required>
                        @if(old('order_date', null) != null)
                            <option selected value="{{ old('order_date') }}">{{ old('order_date') }}</option>
                        @endif
                        @foreach($product->availableDates() as $order_date)
                            <option value="{{ $order_date }}">{{ $order_date }}</option>
                        @endforeach
                    </select>
                    @if ($errors->has('order_date'))
                        <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('order_date') }}</strong>
                            </span>
                    @endif
                </div>
                <button type="submit" class="btn my_account_btn dashboard-btn">Order</button>
                </form>
                </p>
            @endauth

        </div>
    </div>
</div> --}}
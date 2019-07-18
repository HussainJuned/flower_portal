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
</div>
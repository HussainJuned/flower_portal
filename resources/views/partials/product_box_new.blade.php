
    <li class="product-col">
        <div class="product">
            <a {{ route('products.show', ['product' => $product->id]) }}>
                <div class="images">
                    <div class="image">
                        <div class="img"
                             style="background-image: url(../{{ $product->photo_url }}) "></div>
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
                                {{--<div class="add_to_cart">
                                    <i class="fas fa-plus"></i>
                                </div>--}}
                            </span>
                        <span class="each">Price per stem</span>
                    </div>
                </div>
            </a>
        </div>
    </li>


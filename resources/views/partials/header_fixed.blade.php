<header class="mb-3" xmlns:v-on="http://www.w3.org/1999/xhtml" xmlns:v-on="http://www.w3.org/1999/xhtml">
    <nav class="navbar navbar-expand-lg navbar-light bg-white">
        <div class="container">

            <a class="navbar-brand" href="{{ route('intro') }}">Floral Portal <br> <span
                    class="text-dark">Floweret</span></a>

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto nav_left" id="fixed_nav">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('home') }}">Home <span class="sr-only">Home</span></a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="{{ route('search.flower') }}">Shop <span class="sr-only">Shop</span></a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('home') }}">Contact <span class="sr-only">Contact</span></a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('search.intro') }}">Search Page<span
                                class="sr-only">Search</span></a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="#" id="main_search"><i class="fas fa-search" id="main_search_icon"></i> <span
                                class="sr-only">Search</span></a>
                    </li>

                    <li class="nav-item full_area" id="full_search">
                        <main-nav-search v-bind:delivery_date="delivery_date"></main-nav-search>
                    </li>


                </ul>


                <ul class="navbar-nav ml-auto nav_right">

                    @guest
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">Sign In</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">Register</a>
                        </li>
                    @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle my_account_btn" href="#"
                               role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ auth()->user()->name }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a href="{{ route('buyer_dashboard.buyer_dashboard') }}"
                                   class="dropdown-item">
                                    Buyer Dashboard
                                </a>
                                <a href="{{ route('seller_dashboard.seller_dashboard') }}"
                                   class="dropdown-item">
                                    Seller Dashboard
                                </a>
                                <a href="{{ route('products.create') }}"
                                   class="dropdown-item">
                                    Upload Product
                                </a>
                                <a href="{{ route('userinfos.edit', ['userinfo' => Auth::user()->userinfo->id]) }}"
                                   class="dropdown-item">
                                    My Details
                                </a>
 
                                <a href="{{ route('seller_dashboard.myProducts') }}"
                                   class="dropdown-item">
                                    My Product
                                </a>

                                <a href="{{ route('buyer_dashboard.order.past_history') }}"
                                   class="dropdown-item">
                                    Buying History
                                </a>

                                <a href="{{ route('seller_dashboard.order.past_history') }}"
                                   class="dropdown-item">
                                    Selling History
                                </a>


                                <a href="{{ route('seller_dashboard.myProducts') }}"
                                   class="dropdown-item">
                                    Favourites
                                </a>

                                <a href="{{ route('buyer_dashboard.list.invoices') }}"
                                   class="dropdown-item">
                                    Invoices
                                </a>

                                {{--<a href="{{ route('seller_dashboard.myProducts') }}"
                                   class="dropdown-item">
                                    Communication
                                </a>--}}

                                <a href="{{ route('settings.preferred_communication') }}"
                                   class="dropdown-item">
                                    Communication
                                </a>

                                <a class="dropdown-item text-danger" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    <i class="fas fa-sign-out-alt"></i> {{ __('Logout') }}
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                      style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link nav_btn_fav" href="{{ route('login') }}"> <i class="fas fa-heart"></i>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link nav_btn_cart" href="{{ route('login') }}" data-toggle="modal"
                               data-target="#cart">
                                <i class="fas fa-shopping-cart"></i> Shopping Cart </a>
                        </li>


                    @endguest
                </ul>


            </div>
        </div>
    </nav>
    <div class="bottom_menu py-0">
        <div class="container_large">
            <div class="row">
                <div class="col-sm-6">
                    <nav class="navbar navbar-light navbar-expand-md py-0">
                        <ul class="navbar-nav nav_left">
                            <li class="nav-item"><a href="" class="nav-link">Home</a></li>
                            <li class="nav-item active"><a href="" class="nav-link">Flowers</a></li>
                        </ul>
                    </nav>
                </div>
                <div class="col-sm-6 text-right align-self-center">
                    
                    <select name="select-date" id="select-date" class="custom-select" v-on:change="onDDChange($event)">

                        @if (session()->has('order_date'))
                            <option value="{{ session()->get('order_date') }}" selected>
                                @if (\Carbon\Carbon::today()->toDateString() == session()->get('order_date'))
                                    Today
                                    
                                    @else

                                    {{ \Carbon\Carbon::parse(session()->get('order_date'))->format('l') }}
                                @endif
                                - {{ session()->get('order_date') }}</option>
                             
                        @endif

                         <option value="{{ \Carbon\Carbon::today()->addDays(1)->toDateString() }}">Tomorrow</option>

                        <option value="{{ \Carbon\Carbon::today()->addDays(0)->toDateString() }}">Today</option>
                      
                        @for( $i=2; $i<14; $i++)
                            <option value="{{ \Carbon\Carbon::today()->addDays($i)->toDateString() }}">{{ \Carbon\Carbon::today()->addDays($i)->format('l') }} - {{ \Carbon\Carbon::today()->addDays($i)->toDateString() }}</option>
                        @endfor
                    </select>
                </div>
            </div>
        </div>
    </div>
</header>

<!-- Modal -->
<div class="modal fade" id="cart" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Shopping Cart</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="my-3 shopping-cart">

                    <h4 v-if="delivery_date" class="text-center">Delivery Date: <span>@{{ delivery_date }}</span> </h4>


                        <form action="{{ route('order.details.buyer') }}" id="card_order_form" method="post">

                            <template v-if="cart_products">
                                <div class="row mb-3">
                                    <div class="col-5 text-right">Product</div>
                                    <div class="col-2 text-right">QTY</div>
                                    <div class="col-2 px-0 text-center">Price</div>
                                    <div class="col-1 px-0">Sold By</div>
                                    <div class="col-2 px-0">Total Stems</div>
                                </div>
                            <section class="item" v-for="cart_product in cart_products">
                                <input type="number" name="product_id[]" v-bind:value="cart_product.id" hidden>
                                <div class="buttons">
                                    <span class="delete-btn"></span>
                                    <span class="like-btn"></span>
                                </div>

                                <div class="image">
                                    <img class="img-fluid" v-bind:src="  '/' + cart_product.photo_url " alt=""/>
                                </div>

                                <div class="description">
                                    <span>@{{ cart_product.name }}</span>
                                    <span>@{{ cart_product.stock }} in stock</span>
{{--                                    <span>Delivery Date: </span>--}}
                                </div>

                                <div class="quantity">

                                    <button class="plus-btn" type="button" name="button" >
                                        <img src="{{ asset('images/icons/plus.svg') }}" alt="+"/>
                                    </button>
                                    <input type="text" name="quantity[]" value="1" min="1" class="q" v-bind:max="cart_product.stock">
                                    <button class="minus-btn" type="button" name="button">
                                        <img src="{{ asset('images/icons/minus.svg') }}" alt="-"/>
                                    </button>
                                    {{--<div class="delivery_date">
                                        <select class="cart_order_date" name="order_date[]" required>
                                            <option selected v-for="ad in cart_product.ad" v-bind:value="ad">@{{ ad }}</option>
                                        </select>
                                    </div>--}}

                                </div>


                                <div class="total-price">$ <span class="price_value" v-bind:data-price="cart_product.price">@{{ cart_product.price }}</span> </div>
                                <div class="sold-type"> <span class="s_type_value" v-bind:data-price="cart_product.pack">@{{ cart_product.pack }}</span> </div>
                                <div class="total-stem"> <span class="stem_value" v-bind:data-price="cart_product.number_of_stem">@{{ cart_product.number_of_stem }}</span> </div>
                            </section>
                            </template>
                            <input type="text" name="delivery_date" v-bind:value="delivery_date" hidden>
                            @csrf
                        </form>



                </div>
            </div>
            <div class="modal-footer">
                <input type="submit" class="btn btn-primary" {{--data-dismiss="modal"--}}
                id="cart_order_now" form="card_order_form" value="Check Out">
            </div>
        </div>
    </div>
</div>


<div class="popup">
    <p>Added to cart Successfully</p>
</div>


@push('footer-js')
    <script type="text/javascript">

        $(document).ready(function () {


            $(document).on('click', '.minus-btn', function(e) {
                e.preventDefault();
                var $this = $(this);
                var $input = $this.closest('div').find('input');

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

            $('.shopping-cart').on('click', '.plus-btn', function(e) {
                e.preventDefault();

                var $this = $(this);
                var $input = $this.closest('div').find('input');

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

            $('.like-btn').on('click', function() {
                $(this).toggleClass('is-active');

            });

            $(document).on('click', '.delete-btn', function (event) {
                $(this).parent().parent().remove();
            });

            /*$("#cart_order_now").on('click', function(){
                console.log('clicked');
                $(".shopping-cart form").each(function(){
                    var fd = new FormData($(this)[0]);
                    $.ajax({
                        type: "get",
                        url: "cart/try",
                        data: fd,
                        success: function(data,status) {
                            console.log(data);
                        },
                        error: function(data, status) {
                            //this will execute when get any error
                        },
                    });
                });
            });*/


        })
    </script>

    <script>
        /*var specifiedElement = document.getElementById('full_search');
        var specifiedElement2 = document.getElementById('main_search');

        //I'm using "click" but it works with any event
        document.addEventListener('click', function(event) {
            var isClickInside = specifiedElement.contains(event.target);
            var isClickInside2 = specifiedElement2.contains(event.target);

            if (!isClickInside &&  !isClickInside2) {
                //the click was outside the specifiedElement, do something
                $('#fixed_nav').removeClass('show_search');
            }
        });*/

        $('#main_search').on('click', function (event) {
            $('#fixed_nav').addClass('show_search');
        });

        /*$('#main_search_x').on('click', function (event) {
            $('#fixed_nav').removeClass('show_search');
            $('#main_search_inp').val('');
            $('#main_s_result').text('');
        });*/
    </script>

@endpush

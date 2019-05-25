<header class="mb-3" xmlns:v-on="http://www.w3.org/1999/xhtml" xmlns:v-on="http://www.w3.org/1999/xhtml">
    <nav class="navbar navbar-expand-lg navbar-light bg-white">
        <div class="container">

            <a class="navbar-brand" href="{{ route('intro') }}">Floral Portal <br> <span
                    class="text-dark">Flowerat</span></a>

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto nav_left">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('home') }}">Home <span class="sr-only">Home</span></a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="{{ route('home') }}">Shop <span class="sr-only">Shop</span></a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('home') }}">Contact <span class="sr-only">Contact</span></a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('search.intro') }}"><i class="fas fa-search"></i> <span
                                class="sr-only">Search</span></a>
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
                                My Account
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
                                <a href="{{ route('seller_dashboard.myProducts') }}"
                                   class="dropdown-item">
                                    My Product
                                </a>

                                <a href="{{ route('seller_dashboard.myProducts') }}"
                                   class="dropdown-item">
                                    My History
                                </a>

                                <a href="{{ route('seller_dashboard.myProducts') }}"
                                   class="dropdown-item">
                                    Favourites
                                </a>

                                <a href="{{ route('seller_dashboard.myProducts') }}"
                                   class="dropdown-item">
                                    Invoices
                                </a>

                                <a href="{{ route('seller_dashboard.myProducts') }}"
                                   class="dropdown-item">
                                    Communication
                                </a>

                                <a href="{{ route('seller_dashboard.myProducts') }}"
                                   class="dropdown-item">
                                    Preferred departure date
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
                        <option value="{{ \Carbon\Carbon::today()->toDateString() }}">Today</option>
                        @for( $i=1; $i<14; $i++)
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


                        <form action="{{ route('order.details.buyer') }}" id="card_order_form">
                            <template v-if="cart_products">
                            <section class="item" v-for="cart_product in cart_products">
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
                                    <input type="number" name="product_id[]" v-bind:value="cart_product.id" hidden>
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
                console.log('hi');
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

    </script>

@endpush

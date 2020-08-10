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
                            <li class="nav-item"><a href="{{ route('home')}}" class="nav-link">Home</a></li>
                            <li class="nav-item active"><a href="{{ route('search.flower') }}" class="nav-link">Flowers</a></li>
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
<shopping-cart-component img_plus="{{ asset('images/icons/plus.svg') }}"
                         img_minus="{{ asset('images/icons/minus.svg') }}"
                         route_order_deatails_buyer="{{ route('order.details.buyer') }}"
                         csrf="{{ csrf_token() }}"
>
</shopping-cart-component>


<div class="popup">
    <p>Added to cart Successfully</p>
</div>


@push('footer-js')

    <script type="text/javascript">
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

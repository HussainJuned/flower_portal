<header class="mb-3">
    <nav class="navbar navbar-expand-lg navbar-light bg-white">
        <div class="container">

            <a class="navbar-brand" href="{{ route('intro') }}">Floral Portal <br> <span class="text-dark">Flowerat</span></a>

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
                        <a class="nav-link" href="{{ route('search.intro') }}"><i class="fas fa-search"></i> <span class="sr-only">Search</span></a>
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
                            <a id="navbarDropdown" class="nav-link dropdown-toggle my_account_btn" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
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

                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link nav_btn_fav" href="{{ route('login') }}"> <i class="fas fa-heart"></i> </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link nav_btn_cart" href="{{ route('login') }}"><i class="fas fa-shopping-cart"></i> Shopping Cart  </a>
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
                    <select name="select-date" id="select-date" class="custom-select">
                        <option value="">Tuesday - 5/5/2019</option>
                        <option value="">Wednesday - 6/5/2019</option>
                        <option value="">Thursday - 7/5/2019</option>
                    </select>
                </div>
            </div>
        </div>
    </div>
</header>

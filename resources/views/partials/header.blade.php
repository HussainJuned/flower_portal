<header>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container"><a class="navbar-brand" href="{{ route('intro') }}">Floral Portal</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('home') }}">Home <span class="sr-only">Home</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('search.intro') }}">Search <span class="sr-only">About</span></a>
                    </li>

                    @guest
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">Sign In</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">Register</a>
                        </li>
                    @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                Navigations
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

                            </div>
                        </li>
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>
                                <a href="{{ route('userinfos.show', ['userinfo' => auth()->user()->userinfo->id]) }}"
                                   class="dropdown-item">
                                    View Profile
                                </a>
                                <a href="{{ route('userinfos.edit', ['userinfo' => auth()->user()->userinfo->id]) }}"
                                class="dropdown-item">Manage Account</a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    @endguest


                </ul>
            </div>
        </div>
    </nav>
</header>
<header>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container"><a class="navbar-brand" href="<?php echo e(route('intro')); ?>">Floral Portal</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo e(route('home')); ?>">Home <span class="sr-only">Home</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo e(route('search.intro')); ?>">Search <span class="sr-only">About</span></a>
                    </li>

                    <?php if(auth()->guard()->guest()): ?>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo e(route('login')); ?>">Sign In</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo e(route('register')); ?>">Register</a>
                        </li>
                    <?php else: ?>
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                Navigations
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a href="<?php echo e(route('buyer_dashboard.buyer_dashboard')); ?>"
                                   class="dropdown-item">
                                    Buyer Dashboard
                                </a>
                                <a href="<?php echo e(route('seller_dashboard.seller_dashboard')); ?>"
                                   class="dropdown-item">
                                    Seller Dashboard
                                </a>
                                <a href="<?php echo e(route('products.create')); ?>"
                                   class="dropdown-item">
                                    Upload Product
                                </a>
                                <a href="<?php echo e(route('seller_dashboard.myProducts')); ?>"
                                   class="dropdown-item">
                                    My Product
                                </a>

                            </div>
                        </li>
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                <?php echo e(Auth::user()->name); ?>

                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="<?php echo e(route('logout')); ?>"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    <?php echo e(__('Logout')); ?>

                                </a>
                                <a href="<?php echo e(route('userinfos.show', ['userinfo' => auth()->user()->userinfo->id])); ?>"
                                   class="dropdown-item">
                                    View Profile
                                </a>
                                <a href="<?php echo e(route('userinfos.edit', ['userinfo' => auth()->user()->userinfo->id])); ?>"
                                class="dropdown-item">Manage Account</a>

                                <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
                                    <?php echo csrf_field(); ?>
                                </form>
                            </div>
                        </li>
                    <?php endif; ?>


                </ul>
            </div>
        </div>
    </nav>
</header>
@php
    use \App\CentralLogics\Helpers;
@endphp
<header class="header axil-header header-style-7">
    <div class="axil-header-top">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-6 col-12">
                    <div class="header-top-text">
                        <p><i class="fas fa-star"></i> Free Shipping on Orders Over $150</p>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-12">
                    <div class="header-top-link">
                        <ul class="quick-link">
                            <li><a href="about-us.html">Our Story</a></li>
                            <li><a href="contact-us.html">Contact</a></li>
                            <li><a href="#">FAQ</a></li>
                            <li><a href="blog.html">Blog</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Start Mainmenu Area  -->
    <div id="axil-sticky-placeholder"></div>
    <div class="axil-mainmenu">
        <div class="container-fluid">
            <div class="header-navbar">
                <div class="header-brand">
                    <a href="index.html" class="logo logo-dark">
                        {{-- <img src="{{asset('/assets/images/logo/logo.png')}}" alt="Site Logo"> --}}
                        <h4>MarketPlace</h4>
                    </a>
                    <a href="index.html" class="logo logo-light">
                        <img src="{{asset('/assets/images/logo/logo-light.png')}}" alt="Site Logo">
                    </a>
                </div>
                <div class="header-main-nav">
                    <nav class="mainmenu-nav">
                        <button class="mobile-close-btn mobile-nav-toggler"><i class="fas fa-times"></i></button>
                        <div class="mobile-nav-brand">
                            <a href="index.html" class="logo">
                                <img src="{{asset('/assets/images/logo/logo.png')}}" alt="Site Logo">
                            </a>
                        </div>
                        <ul class="mainmenu">
                            <li class="dropdown">
                                <a class="dropdown-toggle" href="#" role="button" id="dropdown-header-menu" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="far fa-th-large"></i> Categories
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="dropdown-header-menu">
                                    <li><a class="dropdown-item" href="shop-sidebar.html">Fashion</a></li>
                                    <li><a class="dropdown-item" href="shop-sidebar.html">Electronics</a></li>
                                    <li><a class="dropdown-item" href="shop-sidebar.html">Home Decor</a></li>
                                    <li><a class="dropdown-item" href="shop-sidebar.html">Medicine</a></li>
                                    <li><a class="dropdown-item" href="shop-sidebar.html">Furniture</a></li>
                                    <li><a class="dropdown-item" href="shop-sidebar.html">Crafts</a></li>
                                    <li><a class="dropdown-item" href="shop-sidebar.html">Accessories</a></li>
                                    <li><a class="dropdown-item" href="shop-sidebar.html">Handicraft</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="{{ route('generalShop') }}"><i class="far fa-bags-shopping"></i> Shop</a>
                            </li>
                            <li>
                                <a href="shop-sidebar.html"><i class="far fa-badge-percent"></i>Become a vendor</a>
                            </li>
                            <li>
                                <a href="contact.html"><i class="far fa-headset"></i>Support</a>
                            </li>
                        </ul>
                    </nav>
                </div>
                <div class="header-action">
                    <ul class="action-list">
                        <li class="axil-search d-none-laptop">
                            <input type="search" class="placeholder product-search-input" name="search2" id="search2" value="" maxlength="128" placeholder="Search" autocomplete="off">
                            <button type="submit" class="icon wooc-btn-search">
                                <i class="far fa-search"></i>
                            </button>
                        </li>
                        <li class="axil-search d-none-desktop">
                            <a href="javascript:void(0)" class="header-search-icon" title="Search">
                                <i class="far fa-search"></i>
                            </a>
                        </li>
                        <li class="shopping-cart">
                            {{-- <a href="{{ route('cartList') }}" class="cart-dropdown-btn"> --}}
                            <a href="{{ route('cartList') }}">
                                <span class="cart-count badge bg-primary rounded-circle position-absolute top-10 start-100 translate-middle">{{ Helpers::cartTotal() }}</span>
                                <i class="far fa-shopping-cart"></i>
                            </a>
                        </li>

                        <li class="wishlist">
                            <a href="wishlist.html">
                                <i class="far fa-heart"></i>
                            </a>
                        </li>
                        <li class="my-account">
                            <a href="javascript:void(0)">
                                <i class="far fa-user"></i>
                            </a>
                            <div class="my-account-dropdown">
                                <span class="title">QUICKLINKS</span>
                                <ul>
                                    <li>
                                        <a href="my-account.html">My Account</a>
                                    </li>
                                    <li>
                                        <a href="#">Initiate return</a>
                                    </li>
                                    <li>
                                        <a href="#">Support</a>
                                    </li>
                                    <li>
                                        <a href="#">Language</a>
                                    </li>
                                </ul>
                                <div class="login-btn">
                                    <a href="sign-in.html" class="axil-btn btn-bg-primary">Login</a>
                                </div>
                                <div class="reg-footer text-center">No account yet? <a href="sign-up.html" class="btn-link">REGISTER HERE.</a></div>
                            </div>
                        </li>
                        <li class="axil-mobile-toggle">
                            <button class="menu-btn mobile-nav-toggler">
                                <i class="flaticon-menu-2"></i>
                            </button>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- End Mainmenu Area -->
</header>

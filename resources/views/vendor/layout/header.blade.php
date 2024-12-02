@php
    use \App\CentralLogics\Helpers;
    $categories = Helpers::categories();
    $vendor = Helpers::vendor();
@endphp
<header class="header axil-header header-style-7">
    <div class="axil-header-top d-none">
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
                    <a href="{{route('landing')}}" class="logo logo-dark">
                        {{-- <img src="{{asset('/assets/images/logo/logo.png')}}" alt="Site Logo"> --}}
                        <h4>MarketPlace</h4>
                    </a>
                    <a href="{{route('landing')}}" class="logo logo-light">
                        <img src="{{asset('/assets/images/logo/logo-light.png')}}" alt="Site Logo">
                    </a>
                </div>
                <div class="header-main-nav">
                    <nav class="mainmenu-nav">
                        <button class="mobile-close-btn mobile-nav-toggler"><i class="fas fa-times"></i></button>
                        <div class="mobile-nav-brand">
                            <a href="{{route('landing')}} class="logo">
                                <img src="{{asset('/assets/images/logo/logo.png')}}" alt="Site Logo">
                            </a>
                        </div>
                        <ul class="mainmenu">
                            <li class="dropdown">
                                <a class="dropdown-toggle" href="#" role="button" id="dropdown-header-menu" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="far fa-th-large"></i> Categories
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="dropdown-header-menu">
                                    @foreach ($categories as $item)
                                        <li><a class="dropdown-item" href="{{ route('categoryShop', $item->slug) }}">{{ $item->name }}</a></li>
                                    @endforeach
                                </ul>
                            </li>
                            <li>
                                <a href="{{ route('vendorDashboard') }}"><i class="fas fa-th-large"></i> Dashboard</a>
                            </li>
                            <li>
                                <a href="{{ route('vendorShop', ['owner_id'=>$owner->id, 'shop_slug'=>$vendor->slug]) }}"><i class="fas fa-stream"></i>My Shop</a>
                            </li>
                            <li>
                                <a href="{{ route('vendorOrders') }}"><i class="far fa-bags-shopping"></i>Orders</a>
                            </li>
                            <li>
                                <a href="contact.html"><i class="far fa-user"></i>Customers</a>
                            </li>
                        </ul>
                    </nav>
                </div>
                <div class="header-action">
                    <ul class="action-list">
                        <li class="d-none axil-search d-none-laptop">
                            <input type="search" class="placeholder product-search-input" name="search2" id="search2" value="" maxlength="128" placeholder="Search" autocomplete="off">
                            <button type="submit" class="icon wooc-btn-search">
                                <i class="far fa-search"></i>
                            </button>
                        </li>
                        <li class="d-none axil-search d-none-desktop">
                            <a href="javascript:void(0)" class="header-search-icon" title="Search">
                                <i class="far fa-search"></i>
                            </a>
                        </li>
                        <li class="shopping-cart">
                            <a href="#" class="cart-dropdown-btn">
                                <span class="cart-count">{{ Helpers::cartTotal() }}</span>
                                <i class="far fa-shopping-cart"></i>
                            </a>
                        </li>
                        <li class="wishlist d-none">
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
                                    @if (Auth::guest())
                                    <li>
                                        <a href="{{ route('vendorAccount') }}">My Account</a>
                                    </li>
                                    @endif
                                    <li class="d-none">
                                        <a href="#">Initiate return</a>
                                    </li>
                                    <li>
                                        <a href="#">Support</a>
                                    </li>
                                    <li class="d-none">
                                        <a href="#">Language</a>
                                    </li>
                                </ul>
                                @if (Auth::guest())
                                <div class="login-btn">
                                    <a href="{{ route('login') }}" class="axil-btn btn-bg-primary">Login</a>
                                </div>
                                <div class="reg-footer text-center">No account yet? <a href="{{ route('register') }}" class="btn-link">REGISTER HERE.</a></div>

                                @else
                                <div class="login-btn">
                                    <a href="{{ route('logout') }}" class="axil-btn btn-bg-primary">Logout</a>
                                </div>
                                @endif

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

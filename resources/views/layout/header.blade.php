@php
    use \App\CentralLogics\Helpers;
    $categories = Helpers::categories();
    $allVendors = Helpers::allVendors();
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
                            <a href="{{route('landing')}}" class="logo">
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
                                <a href="{{ route('generalShop') }}"><i class="far fa-bags-shopping"></i> Shop</a>
                            </li>

                            <li class="d-none">
                                @if ($vendor)
                                    <a href="{{ route('vendorDashboard') }}"><i class="far fa-badge-percent"></i>Vendor Dashboard</a>
                                @else
                                    <a href="{{ route('vendorRegister') }}"><i class="far fa-badge-percent"></i>Become a vendor</a>
                                @endif
                            </li>

                            @if (count($allVendors) > 0)
                            <li class="dropdown">
                                <a class="dropdown-toggle" href="#" role="button" id="dropdown-header-menu" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="far fa-th-recycle"></i> Select Vendor
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="dropdown-header-menu">
                                    @foreach ($allVendors as $item)
                                        <li><a class="dropdown-item" href="{{ route('vendorShop', ['owner_id'=>$item->user_id, 'shop_slug'=>$item->business_slug]) }}">{{ $item->business_name }}</a></li>
                                    @endforeach
                                </ul>
                            </li>
                            @endif

                            <li class="dropdown">
                                <a class="dropdown-toggle" href="#" role="button" id="dropdown-header-menu" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="far fa-th-recycle"></i> Marketplace
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="dropdown-header-menu">
                                    <li><a class="dropdown-item" href="{{route('landing')}}">Marketplace</a></li>
                                    <li><a class="dropdown-item" href="{{route('landing')}}">Holidays</a></li>
                                    <li><a class="dropdown-item" href="{{route('landing')}}">Rent a space</a></li>
                                    <li><a class="dropdown-item" href="{{route('landing')}}">Property Maintenance</a></li>
                                    <li><a class="dropdown-item" href="{{route('landing')}}">Marketplace</a></li>

                                </ul>
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
                                <span class="title">{{ Auth::guest() ? 'QUICK LINKS' : Auth::user()->name }}</span>
                                <ul>
                                    <li>
                                        <a href="{{ route('account') }}">My Account</a>
                                    </li>
                                    @if ($vendor)
                                    <li>
                                        <a href="{{ route('vendorDashboard') }}">Vendor Dashboard</a>
                                    </li>
                                    @else
                                        <li>
                                            <a href="{{ route('vendorRegister') }}">Become a Vendor</a>
                                        </li>
                                    @endif

                                    <li>
                                        <a href="#">Support</a>
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

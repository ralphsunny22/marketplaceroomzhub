@extends('layout.design')
@section('title')Market place :: RoomzHub @endsection

@section('extra_css')@endsection

@section('content')
<main class="main-wrapper">
    <!-- Start Slider Area -->
    <div class="axil-main-slider-area main-slider-style-4">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <div class="main-slider-content">
                        <h1 class="title">Welcomee to RoomzHub MarketPlacee.</h1>
                        <div class="shop-btn">
                            <a href="shop.html" class="axil-btn btn-bg-primary"><i class="far fa-shopping-cart"></i> Check
                                it Out!</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="slide-thumb-area">
                        <div class="main-thumb">
                            {{-- 740 by 490 --}}
                            <img src="{{asset('/storage/banners/banner2.jpg')}}" alt="Women's Product">
                        </div>
                        <div class="banner-product d-none">
                            <div class="product-details">
                                <h4 class="title"><a href="single-product-8.html">Ladies Stylish Sunglasses</a></h4>
                                <div class="price">$15.22 - $15.22</div>
                                <div class="product-rating">
                                    <span class="icon">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                            </span>
                                    <span class="rating-number">6,400</span>
                                </div>
                            </div>
                            <div class="plus-icon">
                                <i class="far fa-plus"></i>
                            </div>
                        </div>
                        <ul class="shape-group">
                            <li class="shape-1">
                                <svg width="717" height="569" viewBox="0 0 717 569" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M700.635 568.176C593.701 653.555 569.268 645.843 418.418 256.006C229.855 -231.289 -105.017 93.7591 62.1304 620.614" stroke="url(#paint0_linear_3774_13416)" stroke-width="32" stroke-linecap="round" />
                                    <defs>
                                        <linearGradient id="paint0_linear_3774_13416" x1="359.308" y1="-263.741" x2="-235.553" y2="631.772" gradientUnits="userSpaceOnUse">
                                            <stop offset="0.258739" stop-color="#FAF1EE" />
                                            <stop offset="1" stop-color="#FEEAE9" />
                                        </linearGradient>
                                    </defs>
                                </svg>
                            </li>
                            <li class="shape-2">
                                <svg width="806" height="605" viewBox="0 0 806 605" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <g clip-path="url(#clip0_1478_3882)">
                                        <path d="M786.673 3C806.703 135.413 745.738 384.513 341.63 321.606C-163.504 242.971 -51.9045 685.856 476.273 802" stroke="url(#paint0_linear_1478_3882)" stroke-width="32" stroke-linecap="round" />
                                    </g>
                                    <defs>
                                        <linearGradient id="paint0_linear_1478_3882" x1="-232.181" y1="-67.0641" x2="659.844" y2="1032.81" gradientUnits="userSpaceOnUse">
                                            <stop offset="0.525282" stop-color="#FBE9E3" />
                                            <stop offset="1" stop-color="#FFD3C5" />
                                        </linearGradient>
                                        <clipPath id="clip0_1478_3882">
                                            <rect width="806" height="605" fill="white" />
                                        </clipPath>
                                    </defs>
                                </svg>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Slider Area -->

    <!-- Start Categorie Area  -->
    <div class="bg-color-white axil-section-gapcommon d-none">
        <div class="container">
            <div class="slider-section-title section-title-border">
                <h2 class="title">Featured Categories</h2>
            </div>
            <div class="categrie-product-activation-4 slick-layout-wrapper--15 axil-slick-angle angle-top-slide">
                <div class="slick-single-layout">
                    <div class="row row-cols-lg-5 row-cols-sm-3 row-cols-2">
                        <div class="col">
                            <div class="categrie-product categrie-product-4" data-sal="zoom-out" data-sal-delay="100" data-sal-duration="500">
                                <a href="shop-sidebar.html" class="cate-thumb">
                                    <img src="{{asset('/assets/images/product/categories/women.png')}}" alt="product categorie">
                                    <h5 class="cat-title">Women's</h5>
                                </a>
                            </div>
                        </div>
                        <div class="col">
                            <div class="categrie-product categrie-product-4" data-sal="zoom-out" data-sal-delay="100" data-sal-duration="500">
                                <a href="shop-sidebar.html" class="cate-thumb">
                                    <img src="{{asset('/assets/images/product/categories/men.png')}}" alt="product categorie">
                                    <h5 class="cat-title">Men's</h5>
                                </a>
                            </div>
                        </div>
                        <div class="col">
                            <div class="categrie-product categrie-product-4" data-sal="zoom-out" data-sal-delay="100" data-sal-duration="500">
                                <a href="shop-sidebar.html" class="cate-thumb">
                                    <img src="{{asset('/assets/images/product/categories/kid.png')}}" alt="product categorie">
                                    <h5 class="cat-title">Kid's</h5>
                                </a>
                            </div>
                        </div>
                        <div class="col">
                            <div class="categrie-product categrie-product-4" data-sal="zoom-out" data-sal-delay="100" data-sal-duration="500">
                                <a href="shop-sidebar.html" class="cate-thumb">
                                    <img src="{{asset('/assets/images/product/categories/baby.png')}}" alt="product categorie">
                                    <h5 class="cat-title">Baby</h5>
                                </a>
                            </div>
                        </div>
                        <div class="col">
                            <div class="categrie-product categrie-product-4" data-sal="zoom-out" data-sal-delay="100" data-sal-duration="500">
                                <a href="shop-sidebar.html" class="cate-thumb">
                                    <img src="{{asset('/assets/images/product/categories/garden.png')}}" alt="product categorie">
                                    <h5 class="cat-title">Garden</h5>
                                </a>
                            </div>
                        </div>
                        <div class="col">
                            <div class="categrie-product categrie-product-4" data-sal="zoom-out" data-sal-delay="100" data-sal-duration="500">
                                <a href="shop-sidebar.html" class="cate-thumb">
                                    <img src="{{asset('/assets/images/product/categories/beauty.png')}}" alt="product categorie">
                                    <h5 class="cat-title">Beauty</h5>
                                </a>
                            </div>
                        </div>
                        <div class="col">
                            <div class="categrie-product categrie-product-4" data-sal="zoom-out" data-sal-delay="100" data-sal-duration="500">
                                <a href="shop-sidebar.html" class="cate-thumb">
                                    <img src="{{asset('/assets/images/product/categories/toy.png')}}" alt="product categorie">
                                    <h5 class="cat-title">Toys</h5>
                                </a>
                            </div>
                        </div>
                        <div class="col">
                            <div class="categrie-product categrie-product-4" data-sal="zoom-out" data-sal-delay="100" data-sal-duration="500">
                                <a href="shop-sidebar.html" class="cate-thumb">
                                    <img src="{{asset('/assets/images/product/categories/phone.png')}}" alt="product categorie">
                                    <h5 class="cat-title">Phone</h5>
                                </a>
                            </div>
                        </div>
                        <div class="col">
                            <div class="categrie-product categrie-product-4" data-sal="zoom-out" data-sal-delay="100" data-sal-duration="500">
                                <a href="shop-sidebar.html" class="cate-thumb">
                                    <img src="{{asset('/assets/images/product/categories/pet.png')}}" alt="product categorie">
                                    <h5 class="cat-title">Pets</h5>
                                </a>
                            </div>
                        </div>
                        <div class="col">
                            <div class="categrie-product categrie-product-4" data-sal="zoom-out" data-sal-delay="100" data-sal-duration="500">
                                <a href="shop-sidebar.html" class="cate-thumb">
                                    <img src="{{asset('/assets/images/product/categories/cleaner.png')}}" alt="product categorie">
                                    <h5 class="cat-title">Cleaner</h5>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="slick-single-layout">
                    <div class="row row-cols-lg-5 row-cols-sm-3 row-cols-2">
                        <div class="col">
                            <div class="categrie-product categrie-product-4" data-sal="zoom-out" data-sal-delay="100" data-sal-duration="500">
                                <a href="shop-sidebar.html" class="cate-thumb">
                                    <img src="{{asset('/assets/images/product/categories/women.png')}}" alt="product categorie">
                                    <h5 class="cat-title">Women's</h5>
                                </a>
                            </div>
                        </div>
                        <div class="col">
                            <div class="categrie-product categrie-product-4" data-sal="zoom-out" data-sal-delay="100" data-sal-duration="500">
                                <a href="shop-sidebar.html" class="cate-thumb">
                                    <img src="{{asset('/assets/images/product/categories/men.png')}}" alt="product categorie">
                                    <h5 class="cat-title">Men's</h5>
                                </a>
                            </div>
                        </div>
                        <div class="col">
                            <div class="categrie-product categrie-product-4" data-sal="zoom-out" data-sal-delay="100" data-sal-duration="500">
                                <a href="shop-sidebar.html" class="cate-thumb">
                                    <img src="{{asset('/assets/images/product/categories/kid.png')}}" alt="product categorie">
                                    <h5 class="cat-title">Kid's</h5>
                                </a>
                            </div>
                        </div>
                        <div class="col">
                            <div class="categrie-product categrie-product-4" data-sal="zoom-out" data-sal-delay="100" data-sal-duration="500">
                                <a href="shop-sidebar.html" class="cate-thumb">
                                    <img src="{{asset('/assets/images/product/categories/baby.png')}}" alt="product categorie">
                                    <h5 class="cat-title">Baby</h5>
                                </a>
                            </div>
                        </div>
                        <div class="col">
                            <div class="categrie-product categrie-product-4" data-sal="zoom-out" data-sal-delay="100" data-sal-duration="500">
                                <a href="shop-sidebar.html" class="cate-thumb">
                                    <img src="{{asset('/assets/images/product/categories/garden.png')}}" alt="product categorie">
                                    <h5 class="cat-title">Garden</h5>
                                </a>
                            </div>
                        </div>
                        <div class="col">
                            <div class="categrie-product categrie-product-4" data-sal="zoom-out" data-sal-delay="100" data-sal-duration="500">
                                <a href="shop-sidebar.html" class="cate-thumb">
                                    <img src="{{asset('/assets/images/product/categories/beauty.png')}}" alt="product categorie">
                                    <h5 class="cat-title">Beauty</h5>
                                </a>
                            </div>
                        </div>
                        <div class="col">
                            <div class="categrie-product categrie-product-4" data-sal="zoom-out" data-sal-delay="100" data-sal-duration="500">
                                <a href="shop-sidebar.html" class="cate-thumb">
                                    <img src="{{asset('/assets/images/product/categories/toy.png')}}" alt="product categorie">
                                    <h5 class="cat-title">Toys</h5>
                                </a>
                            </div>
                        </div>
                        <div class="col">
                            <div class="categrie-product categrie-product-4" data-sal="zoom-out" data-sal-delay="100" data-sal-duration="500">
                                <a href="shop-sidebar.html" class="cate-thumb">
                                    <img src="{{asset('/assets/images/product/categories/phone.png')}}" alt="product categorie">
                                    <h5 class="cat-title">Phone</h5>
                                </a>
                            </div>
                        </div>
                        <div class="col">
                            <div class="categrie-product categrie-product-4" data-sal="zoom-out" data-sal-delay="100" data-sal-duration="500">
                                <a href="shop-sidebar.html" class="cate-thumb">
                                    <img src="{{asset('/assets/images/product/categories/pet.png')}}" alt="product categorie">
                                    <h5 class="cat-title">Pets</h5>
                                </a>
                            </div>
                        </div>
                        <div class="col">
                            <div class="categrie-product categrie-product-4" data-sal="zoom-out" data-sal-delay="100" data-sal-duration="500">
                                <a href="shop-sidebar.html" class="cate-thumb">
                                    <img src="{{asset('/assets/images/product/categories/cleaner.png')}}" alt="product categorie">
                                    <h5 class="cat-title">Cleaner</h5>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Categorie Area  -->

    <!-- Start Today’s Best Deals -->
    <div class="product-collection-area bg-lighter axil-section-gapcommon d-none">
        <div class="container">
            <div class="section-title-border">
                <h2 class="title">Today’s Best Deals 💥</h2>
                <div class="view-btn"><a href="shop.html">View All Deals</a></div>
            </div>
            <div class="row">
                <div class="col-xl-7">
                    <div class="product-collection product-collection-two">
                        <div class="collection-content">
                            <h3 class="title">Decorative Plant <br> For Home</h3>
                            <div class="price-warp">
                                <span class="price-text">Starting From</span>
                                <span class="price">$35.00</span>
                            </div>
                            <div class="shop-btn">
                                <a href="shop.html" class="axil-btn btn-bg-primary btn-size-md"><i class="far fa-shopping-cart"></i> View All Items</a>
                            </div>
                            <div class="plus-btn">
                                <a href="#" class="plus-icon"><i class="far fa-plus"></i></a>
                            </div>
                        </div>
                        <div class="collection-thumbnail">
                            <img src="{{asset('/assets/images/product/collection_5.jpg')}}" alt="Mega Collection">
                        </div>
                    </div>
                </div>
                <div class="col-xl-5">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="product-collection-three">
                                <div class="collection-content">
                                    <h6 class="title"><a href="shop.html">Ladies Short Sleeve Dress</a></h6>
                                    <div class="price-warp">
                                        <span class="price-text">Starting From</span>
                                        <span class="price">$30.00</span>
                                    </div>
                                </div>
                                <div class="collection-thumbnail">
                                    <img src="{{asset('/assets/images/product/collection_5.png')}}" alt="Product">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="product-collection-three">
                                <div class="collection-content">
                                    <h6 class="title"><a href="shop.html">Oil Soap Wood Home Cleaner</a></h6>
                                    <div class="price-warp">
                                        <span class="price-text">Starting From</span>
                                        <span class="price">$15.22</span>
                                    </div>
                                </div>
                                <div class="collection-thumbnail">
                                    <img src="{{asset('/assets/images/product/collection_6.png')}}" alt="Product">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="product-collection-three">
                                <div class="collection-content">
                                    <h6 class="title"><a href="shop.html">Large Pendant Light Ceiling </a></h6>
                                    <div class="price-warp">
                                        <span class="price-text">Starting From</span>
                                        <span class="price">$11.70</span>
                                    </div>
                                </div>
                                <div class="collection-thumbnail">
                                    <img src="{{asset('/assets/images/product/collection_7.png')}}" alt="Product">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="product-collection-three">
                                <div class="collection-content">
                                    <h6 class="title"><a href="shop.html">Iphone New Model</a></h6>
                                    <div class="price-warp">
                                        <span class="price-text">Starting From</span>
                                        <span class="price">$499.00</span>
                                    </div>
                                </div>
                                <div class="collection-thumbnail">
                                    <img src="{{asset('/assets/images/product/collection_8.png')}}" alt="Product">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Today’s Best Deals -->

    <!-- Start Expolre Product Area  -->
    <div class="axil-product-area bg-color-white section-gap-80-35">
        <div class="container">
            <div class="section-title-border">
                <h2 class="title">Our Products 💥</h2>
                <div class="view-btn"><a href="shop.html">View All Products</a></div>
            </div>
            @if (count($products) > 0)
            <div class="row">
                @foreach ($products as $item)
                <div class="col-xl-3 col-lg-4 col-sm-6 col-12">
                    <div class="axil-product product-style-one has-color-pick mt--40">
                        <div class="thumbnail">
                            <a href="single-product.html">
                                <img src="{{ Storage::url('products/' . $item->featured_image) }}" alt="Product Images">
                            </a>
                            <div class="label-block label-right d-none">
                                <div class="product-badget">20% OFF</div>
                            </div>
                            <div class="product-hover-action">
                                <ul class="cart-action">
                                    <li class="wishlist"><a href="wishlist.html"><i class="far fa-heart"></i></a></li>
                                    <li class="select-option add-to-cart-multiple" data-id="{{ $item->id }}">
                                        <a href="javascript:void(0)" >
                                          Add to Cart
                                          <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true" style="display:none;"></span>
                                        </a>

                                    </li>
                                    <li class="quickview" data-item="{{ json_encode($item) }}"><a href="#" data-bs-toggle="modal" data-bs-target="#quick-view-modal"><i class="far fa-eye"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="product-content">
                            <div class="inner">
                                <h5 class="title"><a href="{{ route('singleProduct', $item->id) }}">{{ $item->name }}</a></h5>
                                <div class="product-price-variant">
                                    <span class="price current-price">${{ $item->price }}</span>
                                    <span class="price old-price d-none">$30</span>
                                </div>
                                <div class="color-variant-wrapper d-none">
                                    <ul class="color-variant">
                                        <li class="color-extra-01 active"><span><span class="color"></span></span>
                                        </li>
                                        <li class="color-extra-02"><span><span class="color"></span></span>
                                        </li>
                                        <li class="color-extra-03"><span><span class="color"></span></span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach

            </div>
            @endif

        </div>
    </div>
    <!-- End Expolre Product Area  -->
    <div class="axil-testimoial-area-two axil-section-gapBottom">
        <div class="container">
            <div class="testimonial-container-box">
                <div class="row">
                    <div class="col-lg-7 d-none">
                        <div class="testimonial-video-box">
                            <div class="thumbnail">
                                <img src="{{asset('/storage/customercare/cc.jpg')}}" alt="Image">
                            </div>
                            <div class="play-btn">
                                <a class="popup-youtube" href="https://www.youtube.com/watch?v=1iIZeIy7TqM"><i class="fas fa-play"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="testimonial-style-three-wrapper">
                            <div class="heading-title">
                                {{-- <h2 class="title">Customers <br>Feedback</h2> --}}
                                <h2 class="title">Customers Feedback</h2>
                            </div>
                            <div class="testimonial-slick-activation-three">
                                <div class="slick-single-layout testimonial-style-three">
                                    <p>It`s no secret testimonials are the driving force behind purchasing decisions. They are such a great way to create immediate trust with prospective clients.</p>
                                    <div class="author-info">
                                        <h6 class="author-name">Wade Warren</h6>
                                        <span class="author-desg">Head of Marketing</span>
                                    </div>
                                </div>
                                <div class="slick-single-layout testimonial-style-three">
                                    <p>It`s no secret testimonials are the driving force behind purchasing decisions. They are such a great way to create immediate trust with prospective clients.</p>
                                    <div class="author-info">
                                        <h6 class="author-name">Wade Warren</h6>
                                        <span class="author-desg">Head of Marketing</span>
                                    </div>
                                </div>
                            </div>
                            <div class="testimonial-custom-nav">
                                <div class="row align-items-center">
                                    <div class="col-6">
                                        <div class="slick-slide-count"></div>
                                    </div>
                                    <div class="col-6">
                                        <div class="slide-custom-nav">
                                            <button class="prev-custom-nav"><i class="fal fa-angle-left"></i>Prev</button>
                                            <button class="next-custom-nav">Next <i class="fal fa-angle-right"></i></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--Our Mega Collections -->
    <div class="product-collection-area bg-lighter axil-section-gapcommon d-none">
        <div class="container">
            <div class="section-title-border">
                <h2 class="title">Our Mega Collections 💥</h2>
            </div>
            <div class="row">
                <div class="col-xl-7">
                    <div class="product-collection">
                        <div class="collection-content">
                            <h3 class="title">Explore The <br> Sunglass</h3>
                            <p>The Bouguessa FW21 collection is.</p>
                            <div class="price-warp">
                                <span class="price-text">Starting From</span>
                                <span class="price">$178.00</span>
                            </div>
                            <div class="shop-btn">
                                <a href="shop.html" class="axil-btn btn-bg-primary btn-size-md"><i class="far fa-shopping-cart"></i> SHOP BRAND</a>
                            </div>
                            <div class="plus-btn">
                                <a href="#" class="plus-icon"><i class="far fa-plus"></i></a>
                            </div>
                        </div>
                        <div class="collection-thumbnail">
                            <img src="{{asset('/assets/images/product/collection_1.jpg')}}" alt="Mega Collection">
                            <div class="label-block label-right">
                                <div class="product-badget">Sunglass</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-5 col-lg-6">
                    <div class="product-collection">
                        <div class="collection-content">
                            <h3 class="title">Inspire <br> Creativity</h3>
                            <p>The Bouguessa FW21 collection is.</p>
                            <div class="price-warp">
                                <span class="price-text">Starting From</span>
                                <span class="price">$69.00</span>
                            </div>
                            <div class="shop-btn">
                                <a href="shop.html" class="axil-btn btn-bg-primary btn-size-md"><i class="far fa-shopping-cart"></i> SHOP BRAND</a>
                            </div>
                        </div>
                        <div class="collection-thumbnail">
                            <img src="{{asset('/assets/images/product/collection_2.jpg')}}" alt="Mega Collection">
                            <div class="label-block label-right">
                                <div class="product-badget">Sale</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-5 col-lg-6">
                    <div class="product-collection">
                        <div class="collection-content">
                            <h3 class="title">Trade
                                <br> Benifits
                            </h3>
                            <p>The Bouguessa FW21 collection is.</p>
                            <div class="price-warp">
                                <span class="price-text">Starting From</span>
                                <span class="price">$159.00</span>
                            </div>
                            <div class="shop-btn">
                                <a href="shop.html" class="axil-btn btn-bg-primary btn-size-md"><i class="far fa-shopping-cart"></i> SHOP BRAND</a>
                            </div>
                        </div>
                        <div class="collection-thumbnail">
                            <img src="{{asset('/assets/images/product/collection_3.jpg')}}" alt="Mega Collection">
                        </div>
                    </div>
                </div>
                <div class="col-xl-7">
                    <div class="product-collection">
                        <div class="collection-content">
                            <h3 class="title">Find A Great
                                <br> Deal
                            </h3>
                            <p>The Bouguessa FW21 collection is.</p>
                            <div class="price-warp">
                                <span class="price-text">Starting From</span>
                                <span class="price">$299.00</span>
                            </div>
                            <div class="shop-btn">
                                <a href="shop.html" class="axil-btn btn-bg-primary btn-size-md"><i class="far fa-shopping-cart"></i> SHOP BRAND</a>
                            </div>
                        </div>
                        <div class="collection-thumbnail">
                            <img src="{{asset('/assets/images/product/collection_4.jpg')}}" alt="Mega Collection">
                            <div class="label-block label-right">
                                <div class="product-badget">Jacket</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
   <!-- Our Mega Collections -->

    <!-- Start Expolre Product Area  -->
    <div class="axil-new-arrivals-product-area fullwidth-container flash-sale-area section-gap-80-35">
        <div class="container ml--xxl-0">
            <div class="section-title-border slider-section-title">
                <h2 class="title">Recently Viewed 💥</h2>
            </div>

            <div class="recently-viwed-activation slick-layout-wrapper--15 axil-slick-angle angle-top-slide">
                @if (count($products) > 0)
                @foreach ($products as $item)

                <div class="slick-single-layout">
                    <div class="axil-product product-style-eight">
                        <div class="thumbnail">
                            <a href="{{ route('singleProduct', $item->id) }}">
                                <img data-sal="zoom-out" data-sal-delay="100" data-sal-duration="800" loading="lazy" class="main-img" src="{{ Storage::url('products/' . $item->featured_image) }}" alt="Product Images">
                            </a>
                            <div class="label-block label-left">
                                <div class="product-badget sale">Sale</div>
                            </div>
                            <div class="product-hover-action">
                                <ul class="cart-action">
                                    <li class="select-option">
                                        <a href="javascript:void(0)">
                                            <i class="far fa-shopping-cart"></i> Add to Cart
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="product-content">
                            <div class="inner">
                                <h5 class="title"><a href="single-product-8.html">{{ $item->name }}</a></h5>
                                <div class="product-rating">
                                    <span class="icon">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                            </span>
                                    <span class="rating-number">10</span>
                                </div>
                                <div class="product-price-variant">
                                    <span class="price old-price d-none">$30.00</span>
                                    <span class="price current-price">${{ $item->price }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                @endforeach
                @else
                  <div>No Data Available</div>
                @endif

            </div>
        </div>
    </div>
    <!-- End Expolre Product Area  -->

    <!-- Start Flash Sale Area  -->
    <div class="sale-banner-area d-none">
        <div class="container">
            <div class="sale-banner-thumb">
                <a href="shop.html"><img src="{{asset('/assets/images/banner/sale_banner.png')}}" alt="Sale Banner"></a>
            </div>
        </div>
    </div>
    <!-- End Flash Sale Area  -->

    <!-- Start Expolre Product Area  -->
    <div class="axil-product-area bg-color-white axil-section-gapcommon d-none">
        <div class="container">
            <div class="section-title-border slider-section-title">
                <h2 class="title">Popular Weekly Deals 💥</h2>
            </div>
            <div class="popular-product-activation slick-layout-wrapper slick-layout-wrapper--15 axil-slick-angle angle-top-slide">
                <div class="slick-single-layout">
                    <div class="row">
                        <div class="col-md-6 col-12">
                            <div class="axil-product product-style-eight product-list-style-3">
                                <div class="thumbnail">
                                    <a href="single-product-8.html">
                                        <img class="main-img" src="{{asset('/assets/images/product/fashion/product-34.png')}}" alt="Product Images">
                                    </a>
                                </div>
                                <div class="product-content">
                                    <div class="inner">
                                        <div class="product-cate"><a href="#">KIDS’ DOLLS</a></div>
                                        <div class="color-variant-wrapper">
                                            <ul class="color-variant">
                                                <li class="color-extra-01 active"><span><span class="color"></span></span>
                                                </li>
                                                <li class="color-extra-02"><span><span class="color"></span></span>
                                                </li>
                                                <li class="color-extra-03"><span><span class="color"></span></span>
                                                </li>
                                                <li class="color-extra-04"><span><span class="color"></span></span>
                                                </li>
                                                <li class="color-extra-04"><span><span class="color"></span></span>
                                                </li>
                                                <li class="color-extra-05"><span><span class="color"></span></span>
                                                </li>
                                            </ul>
                                        </div>
                                        <h5 class="title"><a href="single-product-8.html">Manhattan Toy Wee Baby Stella Peach 12" Soft Baby Doll</a></h5>
                                        <div class="product-rating">
                                            <span class="icon">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                    </span>
                                            <span class="rating-number">1540</span>
                                        </div>
                                        <div class="product-price-variant">
                                            <span class="price-text">Price</span>
                                            <span class="price current-price">$59.00</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="label-block label-right">
                                    <div class="product-badget sold-out">SOLD OUT</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-12">
                            <div class="axil-product product-style-eight product-list-style-3">
                                <div class="thumbnail">
                                    <a href="single-product-8.html">
                                        <img class="main-img" src="{{asset('/assets/images/product/fashion/product-35.png')}}" alt="Product Images">
                                    </a>
                                </div>
                                <div class="product-content">
                                    <div class="inner">
                                        <div class="product-cate"><a href="#">KIDS’ DOLLS</a></div>
                                        <div class="color-variant-wrapper">
                                            <ul class="color-variant">
                                                <li class="color-extra-01 active"><span><span class="color"></span></span>
                                                </li>
                                                <li class="color-extra-02"><span><span class="color"></span></span>
                                                </li>
                                                <li class="color-extra-03"><span><span class="color"></span></span>
                                                </li>
                                                <li class="color-extra-04"><span><span class="color"></span></span>
                                                </li>
                                                <li class="color-extra-04"><span><span class="color"></span></span>
                                                </li>
                                                <li class="color-extra-05"><span><span class="color"></span></span>
                                                </li>
                                            </ul>
                                        </div>
                                        <h5 class="title"><a href="single-product-8.html">Business Women Suit Set 3 Pieces Notch Lapel Single Breasted Vest </a></h5>
                                        <div class="product-rating">
                                            <span class="icon">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                    </span>
                                            <span class="rating-number">563</span>
                                        </div>
                                        <div class="product-price-variant">
                                            <span class="price-text">Price</span>
                                            <span class="price current-price">$99.00</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="label-block label-right">
                                    <div class="product-badget">TOP SELLING</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-12">
                            <div class="axil-product product-style-eight product-list-style-3">
                                <div class="thumbnail">
                                    <a href="single-product-8.html">
                                        <img class="main-img" src="{{asset('/assets/images/product/fashion/product-36.png')}}" alt="Product Images">
                                    </a>
                                </div>
                                <div class="product-content">
                                    <div class="inner">
                                        <div class="product-cate"><a href="#">KIDS’ DOLLS</a></div>
                                        <div class="color-variant-wrapper">
                                            <ul class="color-variant">
                                                <li class="color-extra-01 active"><span><span class="color"></span></span>
                                                </li>
                                                <li class="color-extra-02"><span><span class="color"></span></span>
                                                </li>
                                                <li class="color-extra-03"><span><span class="color"></span></span>
                                                </li>
                                                <li class="color-extra-04"><span><span class="color"></span></span>
                                                </li>
                                                <li class="color-extra-04"><span><span class="color"></span></span>
                                                </li>
                                                <li class="color-extra-05"><span><span class="color"></span></span>
                                                </li>
                                            </ul>
                                        </div>
                                        <h5 class="title"><a href="single-product-8.html">Skechers Men's Energy Afterburn Lace-Up Sneaker</a></h5>
                                        <div class="product-rating">
                                            <span class="icon">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                    </span>
                                            <span class="rating-number">1,235</span>
                                        </div>
                                        <div class="product-price-variant">
                                            <span class="price-text">Price</span>
                                            <span class="price current-price">$70.00</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="label-block label-right">
                                    <div class="product-badget">20% OFF</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-12">
                            <div class="axil-product product-style-eight product-list-style-3">
                                <div class="thumbnail">
                                    <a href="single-product-8.html">
                                        <img class="main-img" src="{{asset('/assets/images/product/fashion/product-37.png')}}" alt="Product Images">
                                    </a>
                                </div>
                                <div class="product-content">
                                    <div class="inner">
                                        <div class="product-cate"><a href="#">KIDS’ DOLLS</a></div>
                                        <div class="color-variant-wrapper">
                                            <ul class="color-variant">
                                                <li class="color-extra-01 active"><span><span class="color"></span></span>
                                                </li>
                                                <li class="color-extra-02"><span><span class="color"></span></span>
                                                </li>
                                                <li class="color-extra-03"><span><span class="color"></span></span>
                                                </li>
                                                <li class="color-extra-04"><span><span class="color"></span></span>
                                                </li>
                                                <li class="color-extra-04"><span><span class="color"></span></span>
                                                </li>
                                                <li class="color-extra-05"><span><span class="color"></span></span>
                                                </li>
                                            </ul>
                                        </div>
                                        <h5 class="title"><a href="single-product-8.html">Men’s Suit Separates with Performance Stretch Fabric</a></h5>
                                        <div class="product-rating">
                                            <span class="icon">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                    </span>
                                            <span class="rating-number">226</span>
                                        </div>
                                        <div class="product-price-variant">
                                            <span class="price-text">Price</span>
                                            <span class="price current-price">$159.00</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="label-block label-right">
                                    <div class="product-badget sale">SALE</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="slick-single-layout">
                    <div class="row">
                        <div class="col-md-6 col-12">
                            <div class="axil-product product-style-eight product-list-style-3">
                                <div class="thumbnail">
                                    <a href="single-product-8.html">
                                        <img class="main-img" src="{{asset('/assets/images/product/fashion/product-34.png')}}" alt="Product Images">
                                    </a>
                                </div>
                                <div class="product-content">
                                    <div class="inner">
                                        <div class="product-cate"><a href="#">KIDS’ DOLLS</a></div>
                                        <div class="color-variant-wrapper">
                                            <ul class="color-variant">
                                                <li class="color-extra-01 active"><span><span class="color"></span></span>
                                                </li>
                                                <li class="color-extra-02"><span><span class="color"></span></span>
                                                </li>
                                                <li class="color-extra-03"><span><span class="color"></span></span>
                                                </li>
                                                <li class="color-extra-04"><span><span class="color"></span></span>
                                                </li>
                                                <li class="color-extra-04"><span><span class="color"></span></span>
                                                </li>
                                                <li class="color-extra-05"><span><span class="color"></span></span>
                                                </li>
                                            </ul>
                                        </div>
                                        <h5 class="title"><a href="single-product-8.html">Manhattan Toy Wee Baby Stella Peach 12" Soft Baby Doll</a></h5>
                                        <div class="product-rating">
                                            <span class="icon">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                    </span>
                                            <span class="rating-number">1540</span>
                                        </div>
                                        <div class="product-price-variant">
                                            <span class="price-text">Price</span>
                                            <span class="price current-price">$59.00</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="label-block label-right">
                                    <div class="product-badget sold-out">SOLD OUT</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-12">
                            <div class="axil-product product-style-eight product-list-style-3">
                                <div class="thumbnail">
                                    <a href="single-product-8.html">
                                        <img class="main-img" src="{{asset('/assets/images/product/fashion/product-35.png')}}" alt="Product Images">
                                    </a>
                                </div>
                                <div class="product-content">
                                    <div class="inner">
                                        <div class="product-cate"><a href="#">KIDS’ DOLLS</a></div>
                                        <div class="color-variant-wrapper">
                                            <ul class="color-variant">
                                                <li class="color-extra-01 active"><span><span class="color"></span></span>
                                                </li>
                                                <li class="color-extra-02"><span><span class="color"></span></span>
                                                </li>
                                                <li class="color-extra-03"><span><span class="color"></span></span>
                                                </li>
                                                <li class="color-extra-04"><span><span class="color"></span></span>
                                                </li>
                                                <li class="color-extra-04"><span><span class="color"></span></span>
                                                </li>
                                                <li class="color-extra-05"><span><span class="color"></span></span>
                                                </li>
                                            </ul>
                                        </div>
                                        <h5 class="title"><a href="single-product-8.html">Business Women Suit Set 3 Pieces Notch Lapel Single Breasted Vest </a></h5>
                                        <div class="product-rating">
                                            <span class="icon">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                    </span>
                                            <span class="rating-number">563</span>
                                        </div>
                                        <div class="product-price-variant">
                                            <span class="price-text">Price</span>
                                            <span class="price current-price">$99.00</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="label-block label-right">
                                    <div class="product-badget">TOP SELLING</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-12">
                            <div class="axil-product product-style-eight product-list-style-3">
                                <div class="thumbnail">
                                    <a href="single-product-8.html">
                                        <img class="main-img" src="{{asset('/assets/images/product/fashion/product-36.png')}}" alt="Product Images">
                                    </a>
                                </div>
                                <div class="product-content">
                                    <div class="inner">
                                        <div class="product-cate"><a href="#">KIDS’ DOLLS</a></div>
                                        <div class="color-variant-wrapper">
                                            <ul class="color-variant">
                                                <li class="color-extra-01 active"><span><span class="color"></span></span>
                                                </li>
                                                <li class="color-extra-02"><span><span class="color"></span></span>
                                                </li>
                                                <li class="color-extra-03"><span><span class="color"></span></span>
                                                </li>
                                                <li class="color-extra-04"><span><span class="color"></span></span>
                                                </li>
                                                <li class="color-extra-04"><span><span class="color"></span></span>
                                                </li>
                                                <li class="color-extra-05"><span><span class="color"></span></span>
                                                </li>
                                            </ul>
                                        </div>
                                        <h5 class="title"><a href="single-product-8.html">Skechers Men's Energy Afterburn Lace-Up Sneaker</a></h5>
                                        <div class="product-rating">
                                            <span class="icon">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                    </span>
                                            <span class="rating-number">1,235</span>
                                        </div>
                                        <div class="product-price-variant">
                                            <span class="price-text">Price</span>
                                            <span class="price current-price">$70.00</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="label-block label-right">
                                    <div class="product-badget">20% OFF</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-12">
                            <div class="axil-product product-style-eight product-list-style-3">
                                <div class="thumbnail">
                                    <a href="single-product-8.html">
                                        <img class="main-img" src="{{asset('/assets/images/product/fashion/product-37.png')}}" alt="Product Images">
                                    </a>
                                </div>
                                <div class="product-content">
                                    <div class="inner">
                                        <div class="product-cate"><a href="#">KIDS’ DOLLS</a></div>
                                        <div class="color-variant-wrapper">
                                            <ul class="color-variant">
                                                <li class="color-extra-01 active"><span><span class="color"></span></span>
                                                </li>
                                                <li class="color-extra-02"><span><span class="color"></span></span>
                                                </li>
                                                <li class="color-extra-03"><span><span class="color"></span></span>
                                                </li>
                                                <li class="color-extra-04"><span><span class="color"></span></span>
                                                </li>
                                                <li class="color-extra-04"><span><span class="color"></span></span>
                                                </li>
                                                <li class="color-extra-05"><span><span class="color"></span></span>
                                                </li>
                                            </ul>
                                        </div>
                                        <h5 class="title"><a href="single-product-8.html">Men’s Suit Separates with Performance Stretch Fabric</a></h5>
                                        <div class="product-rating">
                                            <span class="icon">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                    </span>
                                            <span class="rating-number">226</span>
                                        </div>
                                        <div class="product-price-variant">
                                            <span class="price-text">Price</span>
                                            <span class="price current-price">$159.00</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="label-block label-right">
                                    <div class="product-badget sale">SALE</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Expolre Product Area  -->

    <!-- Start Order Pickup and Delivery Area  -->
    <div class="delivery-poster-area d-none">
        <div class="container">
            <div class="row">
                <div class="col-xl-6">
                    <div class="delivery-poster pickup">
                        <div class="content">
                            <span class="badge">Always free</span>
                            <h4 class="title">Order Pickup</h4>
                            <p>Choose Order Pickup & we’ll have it waiting for you inside the store.</p>
                        </div>
                        <div class="thumbnail">
                            <img src="{{asset('/assets/images/banner/delivery_1.png')}}" alt="Man">
                        </div>
                    </div>
                </div>
                <div class="col-xl-6">
                    <div class="delivery-poster delivery">
                        <div class="content">
                            <span class="badge">Fast delivery</span>
                            <h4 class="title">Same Day Delivery</h4>
                            <p>We will delivery your goods on the same day on your doorstep.</p>
                        </div>
                        <div class="thumbnail">
                            <img src="{{asset('/assets/images/banner/delivery_2.png')}}" alt="Man">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Order Pickup and Delivery Area  -->

</main>

<!-- Product Quick View Modal Start -->
<div class="modal fade quick-view-product" id="quick-view-modal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><i class="far fa-times"></i></button>
            </div>
            <!-- Alert after adding to cart -->
            <div id="cart-alert-modal" class="alert alert-success text-center" style="display: none;">
                Product added to cart!
            </div>
            <div class="modal-body">
                <div class="single-product-thumb">
                    <div class="row">

                        <div class="col-lg-7 mb--40">
                            <div class="row">
                                <!-- Large Thumbnails (order-lg-2) -->
                                <div class="col-lg-10 order-lg-2">
                                    <div class="single-product-thumbnail product-large-thumbnail axil-product thumbnail-badge zoom-gallery">
                                        <!-- Loop for Featured and Alternates -->
                                        <!-- Featured Image First -->
                                        <div class="thumbnail">
                                            <img src="" alt="Product Images" id="product-featured-image">
                                            <div class="label-block label-right">
                                                <div class="product-badget">20% OFF</div>
                                            </div>
                                            <div class="product-quick-view position-view">
                                                <a href="" class="popup-zoom" id="product-featured-popup-zoom">
                                                    <i class="far fa-search-plus"></i>
                                                </a>
                                            </div>
                                        </div>

                                        <!-- <div class="thumbnail alternate-images-container">
                                            <img src="" alt="Product Images">
                                            <div class="label-block label-right">
                                                <div class="product-badget">20% OFF</div>
                                            </div>
                                            <div class="product-quick-view position-view">
                                                <a href="" class="popup-zoom">
                                                    <i class="far fa-search-plus"></i>
                                                </a>
                                            </div>
                                        </div> -->
                                        <!-- Alternate Images Container (to be populated by JS) -->
                                        <div class="alternate-images-container"></div>

                                    </div>
                                </div>
                                <div class="col-lg-2 order-lg-1">
                                    {{-- <div class="product-small-thumb small-thumb-wrapper">
                                        <div class="small-thumb-img">
                                            <img src="{{asset('/assets/images/product/product-thumb/thumb-08.png')}}" alt="thumb image">
                                        </div>
                                        <div class="small-thumb-img">
                                            <img src="{{asset('/assets/images/product/product-thumb/thumb-07.png')}}" alt="thumb image">
                                        </div>
                                        <div class="small-thumb-img">
                                            <img src="{{asset('/assets/images/product/product-thumb/thumb-09.png')}}" alt="thumb image">
                                        </div>
                                    </div> --}}
                                    <div class="product-small-thumb2 small-thumb-wrapper">
                                        <div class="small-thumb-img">
                                            <img src="" alt="thumb image" id="small-thumb-img">
                                        </div>
                                    </div>
                                    <div class="product-small-thumb small-thumb-wrapper"></div>

                                </div>
                            </div>
                        </div>

                        <div class="col-lg-5 mb--40">
                            <div class="single-product-content">
                                <div class="inner">
                                    <div class="product-rating">
                                        <div class="star-rating">
                                            <img src="{{asset('/assets/images/icons/rate.png')}}" alt="Rate Images">
                                        </div>
                                        <div class="review-link">
                                            <a href="#">(<span>1</span> customer reviews)</a>
                                        </div>
                                    </div>
                                    <h3 class="product-title" id="product-title"></h3>
                                    <span class="price-amount" id="product-price"></span>
                                    <ul class="product-meta d-none">
                                        <li><i class="fal fa-check"></i>In stock</li>
                                        <li><i class="fal fa-check"></i>Free delivery available</li>
                                        <li><i class="fal fa-check"></i>Sales 30% Off Use Code: MOTIVE30</li>
                                    </ul>
                                    <p class="description" id="product-description"></p>

                                    <div class="product-variations-wrapper">

                                        <!-- Start Product Variation  -->
                                        <div class="product-variation d-none">
                                            <h6 class="title">Colors:</h6>
                                            <div class="color-variant-wrapper">
                                                <ul class="color-variant mt--0">
                                                    <li class="color-extra-01 active"><span><span class="color"></span></span>
                                                    </li>
                                                    <li class="color-extra-02"><span><span class="color"></span></span>
                                                    </li>
                                                    <li class="color-extra-03"><span><span class="color"></span></span>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <!-- End Product Variation  -->

                                        <!-- Start Product Variation  -->
                                        <div class="product-variation d-none">
                                            <h6 class="title">Size:</h6>
                                            <ul class="range-variant">
                                                <li>xs</li>
                                                <li>s</li>
                                                <li>m</li>
                                                <li>l</li>
                                                <li>xl</li>
                                            </ul>
                                        </div>
                                        <!-- End Product Variation  -->

                                    </div>

                                    <!-- Start Product Action Wrapper  -->
                                    <div class="product-action-wrapper d-flex-center">
                                        <!-- Start Quentity Action  -->
                                        <div class="pro-qty"><input type="text" id="pro-qty" value="1"></div>
                                        <!-- End Quentity Action  -->

                                        <!-- Start Product Action  -->
                                        <ul class="product-action d-flex-center mb--0">
                                            <li class="add-to-cart">
                                                <a href="javascript:void(0)" class="axil-btn btn-bg-primary">
                                                    Add to Cart
                                                    <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true" style="display:none;"></span>
                                                </a>

                                                <input type="hidden" class="pro-id" id="pro-id" value="">
                                            </li>
                                            <li class="wishlist"><a href="wishlist.html" class="axil-btn wishlist-btn"><i class="far fa-heart"></i></a></li>
                                        </ul>
                                        <!-- End Product Action  -->

                                    </div>
                                    <!-- End Product Action Wrapper  -->
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Product Quick View Modal End -->

@endsection

@section('extra_js')

<!--page add to cart-->
<script>
document.querySelectorAll('.add-to-cart-multiple').forEach(button => {
    button.addEventListener('click', function() {
        let productId = this.getAttribute('data-id');
        let spinner = this.querySelector('.spinner-border');

        // Show spinner and disable the button
        spinner.style.display = 'inline-block';
        this.querySelector('a').disabled = true;

        fetch(`/add-to-cart-multiple/${productId}`)
            .then(response => response.json())
            .then(data => {
                // Hide spinner and re-enable the button
                spinner.style.display = 'none';
                this.querySelector('a').disabled = false;

                if (data.success) {
                    document.querySelector('.cart-count').textContent = data.cartCount;
                    document.getElementById('cart-alert').style.display = 'block';

                    //handle spinner
                    spinner.style.display = 'none';
                    this.querySelector('a').disabled = false;

                    setTimeout(() => document.getElementById('cart-alert').style.display = 'none', 5000);
                }
            })
            .catch(err => {
                // Handle error: Hide spinner and re-enable button on failure
                spinner.style.display = 'none';
                this.querySelector('a').disabled = false;
                console.error('Error adding to cart:', err);
            });
    });
});
</script>

<!--modal content replaced-->
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Add event listener to each quickview button
    document.querySelectorAll('.quickview').forEach(function(quickviewBtn) {
        quickviewBtn.addEventListener('click', function() {
            // Extract the data-item attribute value (which contains JSON data)
            let product = JSON.parse(this.getAttribute('data-item'));

            // Populate the modal with the product details
            document.getElementById('product-title').textContent = product.name;
            document.getElementById('product-description').textContent = product.description || 'No description available.';
            document.getElementById('product-price').textContent = `$${product.price}`;
            document.getElementById('pro-qty').value = `${product.product_qty_in_cart}`;
            document.getElementById('pro-id').value = `${product.id}`;
            document.getElementById('product-featured-image').src = `/storage/products/${product.featured_image}`;
            document.getElementById('product-featured-popup-zoom').href = `/storage/products/${product.featured_image}`;

            // Handle alternate images (assuming alternate_images is an array of image URLs)
            let alternateImages = product.alternate_images ? JSON.parse(product.alternate_images) : null;
            let alternateImagesContainer = document.querySelector('.alternate-images-container');

            document.getElementById('small-thumb-img').src = `/storage/products/${product.featured_image}`;
            let smallThumbsContainer = document.querySelector('.product-small-thumb');

            // Clear the container before adding new images
            alternateImagesContainer.innerHTML = '';
            smallThumbsContainer.innerHTML = '';

            // If there are alternate images, loop through and add them to the container
            if (alternateImages && alternateImages.length > 0) {
                alternateImages.forEach(function(imageUrl) {
                    let thumbnailDiv = document.createElement('div');
                    thumbnailDiv.classList.add('thumbnail');

                    let imgElement = document.createElement('img');
                    imgElement.src = `/storage/products/${imageUrl}`;
                    imgElement.alt = 'Alternate image';

                    let labelBlock = document.createElement('div');
                    labelBlock.classList.add('label-block', 'label-right');

                    let productBadget = document.createElement('div');
                    productBadget.classList.add('product-badget');
                    productBadget.textContent = '20% OFF'; // or some dynamic content if needed

                    labelBlock.appendChild(productBadget);

                    let quickViewDiv = document.createElement('div');
                    quickViewDiv.classList.add('product-quick-view', 'position-view');

                    let zoomLink = document.createElement('a');
                    zoomLink.href = `/storage/products/${imageUrl}`;
                    zoomLink.classList.add('popup-zoom');

                    let zoomIcon = document.createElement('i');
                    zoomIcon.classList.add('far', 'fa-search-plus');

                    zoomLink.appendChild(zoomIcon);
                    quickViewDiv.appendChild(zoomLink);

                    thumbnailDiv.appendChild(imgElement);
                    thumbnailDiv.appendChild(labelBlock);
                    thumbnailDiv.appendChild(quickViewDiv);

                    // Append the thumbnail div to the container
                    alternateImagesContainer.appendChild(thumbnailDiv);
                });

                //small imgs
                alternateImages.forEach(function(imageUrl) {
                    let smallThumbDiv = document.createElement('div');
                    smallThumbDiv.classList.add('small-thumb-img');

                    let imgElement = document.createElement('img');
                    imgElement.src = `/storage/products/${imageUrl}`;
                    imgElement.alt = 'Small thumbnail image';

                    smallThumbDiv.appendChild(imgElement);

                    // Append the small thumbnail div to the container
                    smallThumbsContainer.appendChild(smallThumbDiv);
                });

            } else {
                // If no alternate images, show a message or leave the container empty
                alternateImagesContainer.textContent = 'No alternate images available.';
            }

        });
    });
});
</script>

<!--modal onclick alt-imgs replace featured img-->
<script>
$(document).ready(function() {
    // Attach click event to each .small-thumb-img div
    $('.small-thumb-img').on('click', function() {
        // Find and grab the img src from the clicked div
        let imgSrc = $(this).find('img').attr('src');
        console.log(imgSrc);

        // Update the main image and popup zoom link
        $('#product-featured-image').attr('src', imgSrc);
        $('#product-featured-popup-zoom').attr('href', imgSrc);
    });
});
</script>

<!--modal add to cart-->
<script>
document.querySelector('.add-to-cart').addEventListener('click', function() {
    let productId = this.querySelector('.pro-id').value;
    // console.log({productId});
    let qtyValue = document.querySelector('#pro-qty').value;
    console.log({productId, qtyValue});

    let spinner = this.querySelector('.spinner-border');

    // Show spinner and disable the button
    spinner.style.display = 'inline-block';
    this.querySelector('a').disabled = true;

    fetch(`/add-to-cart/${productId}/${qtyValue}`)
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                document.querySelector('.cart-count').textContent = data.cartCount; //cart-count
                document.getElementById('cart-alert-modal').style.display = 'block';

                //handle spinner
                spinner.style.display = 'none';
                this.querySelector('a').disabled = false;
                setTimeout(() => document.getElementById('cart-alert-modal').style.display = 'none', 2000);
            }
        })
        .catch(err => {
                // Handle error: Hide spinner and re-enable button on failure
                spinner.style.display = 'none';
                this.querySelector('a').disabled = false;
                console.error('Error adding to cart:', err);
            });
});
</script>
@endsection

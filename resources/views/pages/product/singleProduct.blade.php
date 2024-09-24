@extends('layout.design')
@section('title'){{ $product->name }} :: Marketplace @endsection

@section('extra_css')@endsection

@section('content')

<!-- Alert after adding to cart -->
<div id="cart-alert" class="alert alert-success text-center" style="display: none;">
    Product added to cart!
</div>

<main class="main-wrapper">
    <div class="axil-single-product-area bg-color-white">
        {{-- <div class="single-product-thumb axil-section-gapcommon single-product-modern"> --}}
            <div class="single-product-thumb axil-section-gap pb--20 pb_sm--0 bg-vista-white">
            <div class="container">
                <div class="row row--20">

                    <div class="col-lg-6 mb--40">
                        <div class="row">
                            <!-- Large Thumbnails (order-lg-2) -->
                            <div class="col-lg-10 order-lg-2">
                                <div class="single-product-thumbnail-wrap zoom-gallery">
                                    <div class="product-large-thumbnail single-product-thumbnail axil-product">
                                        <!-- Loop for Featured and Alternates -->
                                        <!-- Featured Image First -->
                                        <div class="thumbnail">
                                            <a href="{{ Storage::url('products/' . $product->featured_image) }}" class="popup-zoom">
                                                <img src="{{ Storage::url('products/' . $product->featured_image) }}" alt="Product Image">
                                            </a>
                                        </div>

                                        @if (isset($alternate_images))
                                            <!-- Loop through Alternates -->
                                            @foreach(json_decode($product->alternate_images) as $alternate)
                                            <div class="thumbnail">
                                                <a href="{{ Storage::url('products/' . $alternate) }}" class="popup-zoom">
                                                    <img src="{{ Storage::url('products/' . $alternate) }}" alt="Product Image">
                                                </a>
                                            </div>
                                            @endforeach
                                        @endif

                                    </div>

                                    <!-- Optionally Add Badge or Quick View -->
                                    <div class="label-block">
                                        <div class="product-badget">20% OFF</div>
                                    </div>
                                    <div class="product-quick-view position-view">
                                        {{-- <a href="{{ asset('storage/' . $product->featured_image) }}" class="popup-zoom"> --}}
                                        <a href="{{ Storage::url('products/' . $product->featured_image) }}" class="popup-zoom">
                                            <i class="far fa-search-plus"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>

                            <!-- Small Thumbnails (order-lg-1) -->
                            <div class="col-lg-2 order-lg-1">
                                <div class="product-small-thumb small-thumb-wrapper small-thumb-style-two">
                                    <!-- Loop for Small Thumbnails -->
                                    <div class="small-thumb-img">
                                        <img src="{{ asset('storage/products/' . $product->featured_image) }}" alt="thumb image">
                                    </div>

                                    @if (isset($alternate_images))
                                        @foreach(json_decode($product->alternate_images) as $alternate)
                                        <div class="small-thumb-img">
                                            <img src="{{ asset('storage/products/' . $alternate) }}" alt="thumb image">
                                        </div>
                                        @endforeach
                                    @endif

                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6 mb--40">
                        <div class="single-product-content">
                            <div class="inner">
                                <h2 class="product-title">{{ $product->name }}</h2>
                                <span class="price-amount">${{ $product->price }}</span>
                                <div class="product-rating">
                                    <div class="star-rating">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="far fa-star"></i>
                                    </div>
                                    <div class="review-link">
                                        <a href="#">(<span>2</span> customer reviews)</a>
                                    </div>
                                </div>
                                <ul class="product-meta">
                                    <li><i class="fal fa-check"></i>In stock</li>
                                </ul>
                                <p class="description">{{ $product->description }}</p>

                                <div class="product-variations-wrapper d-none">

                                    <!-- Start Product Variation  -->
                                    <div class="product-variation">
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
                                    <div class="product-variation product-size-variation">
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
                                    <div class="pro-qty mr--20"><input class="qty-val" type="text" value="{{ $cartProductQty }}"></div>
                                    <!-- End Quentity Action  -->

                                    <!-- Start Product Action  -->
                                    <ul class="product-action d-flex-center mb--0">
                                        <li class="add-to-cart" data-id="{{ $product->id }}"><a href="javascript:void(0)" class="axil-btn btn-bg-primary">Add to Cart</a></li>
                                        <li class="wishlist"><a href="wishlist.html" class="axil-btn wishlist-btn"><i class="far fa-heart"></i></a></li>
                                    </ul>
                                    <!-- End Product Action -->

                                </div>
                                <!-- End Product Action Wrapper  -->

                                <!-- End .product-desc-wrapper -->
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <!-- End .single-product-thumb -->
        <div class="woocommerce-tabs wc-tabs-wrapper bg-lighter wc-tab-style-two">
            <div class="container">
                <div class="section-title-wrapper section-title-border">
                    <h2 class="title">About This Product 💥</h2>
                </div>
                <div class="tabs-wrap">
                    <ul class="nav tabs" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <a class="active" id="description-tab" data-bs-toggle="tab" href="#description" role="tab" aria-controls="description" aria-selected="true">Specifications</a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a id="reviews-tab" data-bs-toggle="tab" href="#reviews" role="tab" aria-controls="reviews" aria-selected="false">Reviews</a>
                        </li>
                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="description" role="tabpanel" aria-labelledby="description-tab">
                            <div class="product-desc-wrapper">
                                <div class="single-desc">
                                    <h5 class="title">Key feature</h5>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <ul>
                                                <li>6.1-inch Super Retina XDR display1</li>
                                                <li>Advanced camera system for better photos in any light</li>
                                                <li>Cinematic mode now in 4K Dolby Vision up to 30 fps</li>
                                                <li>A15 Bionic chip with 5-core GPU for lightning-fast performance.
                                                    Superfast 5G cellular4</li>
                                                <li>Vital safety features Emergency SOS via satellite2 and Crash
                                                    Detection</li>
                                            </ul>
                                        </div>
                                        <div class="col-lg-6">
                                            <ul>
                                                <li>Action mode for smooth, steady, handheld videos </li>
                                                <li>All-day battery life and up to 20 hours of video playback3</li>
                                                <li>Industry-leading durability features with Ceramic Shield and
                                                    water resistance5</li>
                                                <li>iOS 16 offers even more ways to personalize, communicate, and
                                                    share6</li>
                                            </ul>
                                        </div>
                                    </div>

                                </div>
                                <!-- End .row -->
                            </div>
                            <!-- End .product-desc-wrapper -->
                        </div>
                        <div class="tab-pane fade" id="reviews" role="tabpanel" aria-labelledby="reviews-tab">
                            <div class="reviews-wrapper">
                                <div class="row">
                                    <div class="col-lg-6 mb--40">
                                        <div class="axil-comment-area pro-desc-commnet-area">
                                            <h5 class="title">Review for this product</h5>
                                            <ul class="comment-list">
                                                <!-- Start Single Comment  -->
                                                <li class="comment">
                                                    <div class="comment-body">
                                                        <div class="single-comment">
                                                            <div class="comment-img">
                                                                <img src="{{asset('/assets/images/blog/author-image-4.png')}}" alt="Author Images">
                                                            </div>
                                                            <div class="comment-inner">
                                                                <h6 class="commenter">
                                                                    <a class="hover-flip-item-wrapper" href="#">
                                                                        <span class="hover-flip-item">
                                                                            <span
                                                                                data-text="Cameron Williamson">Eleanor
                                                                                Pena</span>
                                                                        </span>
                                                                    </a>
                                                                    <span
                                                                        class="commenter-rating ratiing-four-star">
                                                                        <a href="#"><i class="fas fa-star"></i></a>
                                                                        <a href="#"><i class="fas fa-star"></i></a>
                                                                        <a href="#"><i class="fas fa-star"></i></a>
                                                                        <a href="#"><i class="fas fa-star"></i></a>
                                                                        <a href="#"><i
                                                                                class="fas fa-star empty-rating"></i></a>
                                                                    </span>
                                                                </h6>
                                                                <div class="comment-text">
                                                                    <p>“We’ve created a full-stack structure for our
                                                                        working workflow processes, were from the
                                                                        funny the century initial all the made, have
                                                                        spare to negatives. ” </p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                                <!-- End Single Comment  -->

                                                <!-- Start Single Comment  -->
                                                <li class="comment">
                                                    <div class="comment-body">
                                                        <div class="single-comment">
                                                            <div class="comment-img">
                                                                <img src="{{asset('/assets/images/blog/author-image-4.png')}}" alt="Author Images">
                                                            </div>
                                                            <div class="comment-inner">
                                                                <h6 class="commenter">
                                                                    <a class="hover-flip-item-wrapper" href="#">
                                                                        <span class="hover-flip-item">
                                                                            <span data-text="Rahabi Khan">Courtney
                                                                                Henry</span>
                                                                        </span>
                                                                    </a>
                                                                    <span
                                                                        class="commenter-rating ratiing-four-star">
                                                                        <a href="#"><i class="fas fa-star"></i></a>
                                                                        <a href="#"><i class="fas fa-star"></i></a>
                                                                        <a href="#"><i class="fas fa-star"></i></a>
                                                                        <a href="#"><i class="fas fa-star"></i></a>
                                                                        <a href="#"><i class="fas fa-star"></i></a>
                                                                    </span>
                                                                </h6>
                                                                <div class="comment-text">
                                                                    <p>“We’ve created a full-stack structure for our
                                                                        working workflow processes, were from the
                                                                        funny the century initial all the made, have
                                                                        spare to negatives. ”</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                                <!-- End Single Comment  -->

                                                <!-- Start Single Comment  -->
                                                <li class="comment">
                                                    <div class="comment-body">
                                                        <div class="single-comment">
                                                            <div class="comment-img">
                                                                <img src="{{asset('/assets/images/blog/author-image-5.png')}}" alt="Author Images">
                                                            </div>
                                                            <div class="comment-inner">
                                                                <h6 class="commenter">
                                                                    <a class="hover-flip-item-wrapper" href="#">
                                                                        <span class="hover-flip-item">
                                                                            <span data-text="Rahabi Khan">Devon
                                                                                Lane</span>
                                                                        </span>
                                                                    </a>
                                                                    <span
                                                                        class="commenter-rating ratiing-four-star">
                                                                        <a href="#"><i class="fas fa-star"></i></a>
                                                                        <a href="#"><i class="fas fa-star"></i></a>
                                                                        <a href="#"><i class="fas fa-star"></i></a>
                                                                        <a href="#"><i class="fas fa-star"></i></a>
                                                                        <a href="#"><i class="fas fa-star"></i></a>
                                                                    </span>
                                                                </h6>
                                                                <div class="comment-text">
                                                                    <p>“We’ve created a full-stack structure for our
                                                                        working workflow processes, were from the
                                                                        funny the century initial all the made, have
                                                                        spare to negatives. ” </p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                                <!-- End Single Comment  -->
                                            </ul>
                                        </div>
                                        <!-- End .axil-commnet-area -->
                                    </div>
                                    <!-- End .col -->
                                    <div class="col-lg-6 mb--40">
                                        <!-- Start Comment Respond  -->
                                        <div class="comment-respond pro-des-commend-respond mt--0">
                                            <h5 class="title mb--30">Add a Review</h5>
                                            <p>Your email address will not be published. Required fields are marked
                                                *</p>
                                            <div class="rating-wrapper d-flex-center mb--40">
                                                Your Rating <span class="require">*</span>
                                                <div class="reating-inner ml--20">
                                                    <a href="#"><i class="fal fa-star"></i></a>
                                                    <a href="#"><i class="fal fa-star"></i></a>
                                                    <a href="#"><i class="fal fa-star"></i></a>
                                                    <a href="#"><i class="fal fa-star"></i></a>
                                                    <a href="#"><i class="fal fa-star"></i></a>
                                                </div>
                                            </div>

                                            <form action="#">
                                                <div class="row">
                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <label>Other Notes (optional)</label>
                                                            <textarea name="message" placeholder="Your Comment"></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 col-md-6 col-12">
                                                        <div class="form-group">
                                                            <label>Name <span class="require">*</span></label>
                                                            <input id="name" type="text">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 col-md-6 col-12">
                                                        <div class="form-group">
                                                            <label>Email <span class="require">*</span> </label>
                                                            <input id="email" type="email">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12">
                                                        <div class="form-submit">
                                                            <button type="submit" id="submit" class="axil-btn btn-bg-primary w-auto">Submit
                                                                Comment</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                        <!-- End Comment Respond  -->
                                    </div>
                                    <!-- End .col -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="single-product-features">
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="single-features">
                                <div class="icon">
                                    <i class="far fa-hand-holding-box"></i>
                                </div>
                                <div class="content">
                                    <h6 class="title">Easy Return</h6>
                                    <p>Anytime you can return the product without any payment</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="single-features">
                                <div class="icon quality">
                                    <i class="fal fa-badge-check"></i>
                                </div>
                                <div class="content">
                                    <h6 class="title">Quality Service</h6>
                                    <p>We are dedicated to give you quality service for your happiness</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="single-features">
                                <div class="icon original">
                                    <i class="fal fa-box"></i>
                                </div>
                                <div class="content">
                                    <h6 class="title">Original Product</h6>
                                    <p>We deliver you each and every prodeuct is original </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <!-- woocommerce-tabs -->

    </div>
    <!-- Start Expolre Product Area  -->
    <div class="axil-new-arrivals-product-area fullwidth-container flash-sale-area section-gap-80-35">
        <div class="container ml--xxl-0">
            <div class="section-title-border slider-section-title">
                <h2 class="title">Recently Viewed 💥</h2>
            </div>
            <div class="recently-viwed-activation slick-layout-wrapper--15 axil-slick-angle angle-top-slide">
                <div class="slick-single-layout">
                    <div class="axil-product product-style-eight">
                        <div class="thumbnail">
                            <a href="single-product-8.html">
                                <img data-sal="zoom-out" data-sal-delay="100" data-sal-duration="800" loading="lazy" class="main-img" src="{{asset('/assets/images/product/fashion/product-26.png')}}" alt="Product Images">
                            </a>
                            <div class="label-block label-left">
                                <div class="product-badget sale">Sale</div>
                            </div>
                            <div class="product-hover-action">
                                <ul class="cart-action">
                                    <li class="select-option">
                                        <a href="single-product-8.html">
                                            <i class="far fa-shopping-cart"></i> Add to Cart
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="product-content">
                            <div class="inner">
                                <h5 class="title"><a href="single-product-8.html">Kalrez® Spectrum™ 6375</a></h5>
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
                                <div class="product-price-variant">
                                    <span class="price old-price">$30.00</span>
                                    <span class="price current-price">$17.84</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="slick-single-layout">
                    <div class="axil-product product-style-eight">
                        <div class="thumbnail">
                            <a href="single-product-8.html">
                                <img data-sal="zoom-out" data-sal-delay="150" data-sal-duration="800" loading="lazy" class="main-img" src="{{asset('/assets/images/product/fashion/product-27.png')}}" alt="Product Images">
                            </a>
                            <div class="label-block label-left">
                                <div class="product-badget">20% OFF</div>
                            </div>
                            <div class="product-hover-action">
                                <ul class="cart-action">
                                    <li class="select-option">
                                        <a href="single-product-8.html">
                                            <i class="far fa-shopping-cart"></i> Add to Cart
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="product-content">
                            <div class="inner">
                                <h5 class="title"><a href="single-product-8.html">Calvin Klein womens Solid Sheath With Chiffon Bell Sleeves Dress</a></h5>
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
                                <div class="product-price-variant">
                                    <span class="price old-price">$100.00</span>
                                    <span class="price current-price">$78.00</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="slick-single-layout">
                    <div class="axil-product product-style-eight">
                        <div class="thumbnail">
                            <a href="single-product-8.html">
                                <img data-sal="zoom-out" data-sal-delay="200" data-sal-duration="800" loading="lazy" class="main-img" src="{{asset('/assets/images/product/fashion/product-28.png')}}" alt="Product Images">
                            </a>
                            <div class="label-block label-left">
                                <div class="product-badget">TOP SELLING</div>
                            </div>
                            <div class="product-hover-action">
                                <ul class="cart-action">
                                    <li class="select-option">
                                        <a href="single-product-8.html">
                                            <i class="far fa-shopping-cart"></i> Add to Cart
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="product-content">
                            <div class="inner">
                                <h5 class="title"><a href="single-product-8.html">Gildan Men's Ultra Cotton T-Shirt, Style G2000,</a></h5>
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
                                <div class="product-price-variant">
                                    <span class="price old-price">$20.00</span>
                                    <span class="price current-price">$17.00</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="slick-single-layout">
                    <div class="axil-product product-style-eight">
                        <div class="thumbnail">
                            <a href="single-product-8.html">
                                <img data-sal="zoom-out" data-sal-delay="250" data-sal-duration="800" loading="lazy" class="main-img" src="{{asset('/assets/images/product/fashion/product-29.png')}}" alt="Product Images">
                            </a>
                            <div class="label-block label-left">
                                <div class="product-badget sold-out">SOLD OUT</div>
                            </div>
                            <div class="product-hover-action">
                                <ul class="cart-action">
                                    <li class="select-option">
                                        <a href="single-product-8.html">
                                            <i class="far fa-shopping-cart"></i> Add to Cart
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="product-content">
                            <div class="inner">
                                <h5 class="title"><a href="single-product-8.html">Essentials Men's Regular-Fit Short-Sleeve Crewneck T-Shirt</a></h5>
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
                                <div class="product-price-variant">
                                    <span class="price old-price">$12.00</span>
                                    <span class="price current-price">$5.22</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="slick-single-layout">
                    <div class="axil-product product-style-eight">
                        <div class="thumbnail">
                            <a href="single-product-8.html">
                                <img data-sal="zoom-out" data-sal-delay="100" data-sal-duration="800" loading="lazy" class="main-img" src="{{asset('/assets/images/product/fashion/product-30.png')}}" alt="Product Images">
                            </a>
                            <div class="product-hover-action">
                                <ul class="cart-action">
                                    <li class="select-option">
                                        <a href="single-product-8.html">
                                            <i class="far fa-shopping-cart"></i> Add to Cart
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="product-content">
                            <div class="inner">
                                <h5 class="title"><a href="single-product-8.html">2.4G Remote Control Rc BB-8 Droid Football Robot</a></h5>
                                <div class="product-rating">
                                    <span class="icon">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                            </span>
                                    <span class="rating-number">1,300</span>
                                </div>
                                <div class="product-price-variant">
                                    <span class="price current-price">$100.00</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="slick-single-layout">
                    <div class="axil-product product-style-eight">
                        <div class="thumbnail">
                            <a href="single-product-8.html">
                                <img data-sal="zoom-out" data-sal-delay="150" data-sal-duration="800" loading="lazy" class="main-img" src="{{asset('/assets/images/product/fashion/product-31.png')}}" alt="Product Images">
                            </a>
                            <div class="product-hover-action">
                                <ul class="cart-action">
                                    <li class="select-option">
                                        <a href="single-product-8.html">
                                            <i class="far fa-shopping-cart"></i> Add to Cart
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="product-content">
                            <div class="inner">
                                <h5 class="title"><a href="single-product-8.html">Perfume Nat White Chocolate Flavor WONF (BD-10914)</a></h5>
                                <div class="product-rating">
                                    <span class="icon">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                            </span>
                                    <span class="rating-number">2,300</span>
                                </div>
                                <div class="product-price-variant">
                                    <span class="price current-price">$14.81</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="slick-single-layout">
                    <div class="axil-product product-style-eight">
                        <div class="thumbnail">
                            <a href="single-product-8.html">
                                <img data-sal="zoom-out" data-sal-delay="200" data-sal-duration="800" loading="lazy" class="main-img" src="{{asset('/assets/images/product/fashion/product-32.png')}}" alt="Product Images">
                            </a>
                            <div class="product-hover-action">
                                <ul class="cart-action">
                                    <li class="select-option">
                                        <a href="single-product-8.html">
                                            <i class="far fa-shopping-cart"></i> Add to Cart
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="product-content">
                            <div class="inner">
                                <h5 class="title"><a href="single-product-8.html">Women's Winter Mid Length Thick Warm Faux Lamb Wool.</a></h5>
                                <div class="product-rating">
                                    <span class="icon">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                            </span>
                                    <span class="rating-number">50</span>
                                </div>
                                <div class="product-price-variant">
                                    <span class="price current-price">$59.00</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="slick-single-layout">
                    <div class="axil-product product-style-eight">
                        <div class="thumbnail">
                            <a href="single-product-8.html">
                                <img data-sal="zoom-out" data-sal-delay="250" data-sal-duration="800" loading="lazy" class="main-img" src="{{asset('/assets/images/product/fashion/product-33.png')}}" alt="Product Images">
                            </a>
                            <div class="product-hover-action">
                                <ul class="cart-action">
                                    <li class="select-option">
                                        <a href="single-product-8.html">
                                            <i class="far fa-shopping-cart"></i> Add to Cart
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="product-content">
                            <div class="inner">
                                <h5 class="title"><a href="single-product-8.html">Ion8 One Touch Sport / Bike Water Bottle - Leakproof</a></h5>
                                <div class="product-rating">
                                    <span class="icon">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                            </span>
                                    <span class="rating-number">652</span>
                                </div>
                                <div class="product-price-variant">
                                    <span class="price current-price">$29.00</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Expolre Product Area  -->
    <div class="sale-banner-area">
        <div class="container">
            <div class="sale-banner-thumb">
                <a href="shop.html"><img src="{{asset('/assets/images/banner/sale_banner.png')}}" alt="Sale Banner"></a>
            </div>
        </div>
    </div>
    <div class="service-area axil-section-gapcommon">
        <div class="container">
            <div class="section-title-wrapper section-title-border">
                <h2 class="title">Our Service 💥</h2>
            </div>
            <div class="row">
                <div class="col-lg-3">
                    <div class="service-box service-style-3">
                        <div class="icon">
                            <i class="far fa-truck"></i>
                        </div>
                        <div class="content">
                            <h6 class="title">Fast &amp; Secure Delivery</h6>
                            <p>Tell about your service.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="service-box service-style-3">
                        <div class="icon">
                            <i class="fal fa-badge-check"></i>
                        </div>
                        <div class="content">
                            <h6 class="title">Money Back Guarantee</h6>
                            <p>Within 10 days.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="service-box service-style-3">
                        <div class="icon">
                            <i class="far fa-hand-holding-box"></i>
                        </div>
                        <div class="content">
                            <h6 class="title">24 Hour Return Policy</h6>
                            <p>No question ask.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="service-box service-style-3">
                        <div class="icon">
                            <i class="far fa-headset"></i>
                        </div>
                        <div class="content">
                            <h6 class="title">Pro Quality Support</h6>
                            <p>24/7 Live support.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
@section('extra_js')

<script>
    document.querySelector('.add-to-cart').addEventListener('click', function() {
        let productId = this.getAttribute('data-id');
        // console.log({productId});
        let qtyValue = document.querySelector('.qty-val').value;
        // console.log(qtyValue);

        fetch(`/add-to-cart/${productId}/${qtyValue}`)
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    document.querySelector('.cart-count').textContent = data.cartCount; //cart-count
                    document.getElementById('cart-alert').style.display = 'block';
                    setTimeout(() => document.getElementById('cart-alert').style.display = 'none', 2000);
                }
            });
    });
</script>

@endsection

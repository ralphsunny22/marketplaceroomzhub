@extends('layout.design')
@section('title')Shop :: Marketplace @endsection

@section('extra_css')@endsection

@section('content')

@if (session('success'))
    <div class="alert alert-success text-center">
        {{ session('success') }}
    </div>
@endif

<main class="main-wrapper">
    <!-- Alert after adding to cart -->
    <div id="cart-alert" class="alert alert-success text-center" style="display: none;">
        Product added to cart!
    </div>

    <!-- Start Breadcrumb Area  -->
    <div class="axil-breadcrumb-area">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-8">
                    <div class="inner">
                        <ul class="axil-breadcrumb">
                            <li class="axil-breadcrumb-item"><a href="index.html">Home</a></li>
                            <li class="separator"></li>
                            <li class="axil-breadcrumb-item active" aria-current="page">My Account</li>
                        </ul>
                        <h1 class="title">Explore Our Products</h1>
                    </div>
                </div>
                <div class="col-lg-6 col-md-4">
                    <div class="inner">
                        <div class="bradcrumb-thumb">
                            <img src="{{asset('/assets/images/product/product-45.png')}}" alt="Image">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Breadcrumb Area  -->
    <!-- Start Shop Area  -->
    <div class="axil-shop-area axil-section-gap bg-color-white">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="axil-shop-top">
                        <div class="row">
                            <div class="col-lg-9">
                                <div class="category-select">

                                    <!-- Start Single Select  -->
                                    <select class="single-select">
                                        <option>Categories</option>
                                        <option>Fashion</option>
                                        <option>Electronics</option>
                                        <option>Furniture</option>
                                        <option>Beauty</option>
                                    </select>
                                    <!-- End Single Select  -->

                                    <!-- Start Single Select  -->
                                    <select class="single-select">
                                        <option>Color</option>
                                        <option>Red</option>
                                        <option>Blue</option>
                                        <option>Green</option>
                                        <option>Pink</option>
                                    </select>
                                    <!-- End Single Select  -->

                                    <!-- Start Single Select  -->
                                    <select class="single-select">
                                        <option>Price Range</option>
                                        <option>0 - 100</option>
                                        <option>100 - 500</option>
                                        <option>500 - 1000</option>
                                        <option>1000 - 1500</option>
                                    </select>
                                    <!-- End Single Select  -->

                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="category-select mt_md--10 mt_sm--10 justify-content-lg-end">
                                    <!-- Start Single Select  -->
                                    <select class="single-select">
                                        <option>Sort by Latest</option>
                                        <option>Sort by Name</option>
                                        <option>Sort by Price</option>
                                        <option>Sort by Viewed</option>
                                    </select>
                                    <!-- End Single Select  -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @if (count($products) > 0)

            <div class="row row--15">

                <!-- Single Product  -->
                @foreach ($products as $item)
                <div class="col-xl-3 col-lg-4 col-sm-6">
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
                <!-- End Single Product  -->

            </div>
            <div class="text-center pt--30">
                <a href="#" class="axil-btn btn-bg-lighter btn-load-more">Load more</a>
            </div>
            @else
            <div class="text-center pt--30">
                <h4>No product available at the moment</h4>
            </div>
            @endif
        </div>
        <!-- End .container -->
    </div>
    <!-- End Shop Area  -->
    <!-- Start Axil Newsletter Area  -->
    <div class="axil-newsletter-area axil-section-gap pt--0">
        <div class="container">
            <div class="etrade-newsletter-wrapper bg_image bg_image--5">
                <div class="newsletter-content">
                    <span class="title-highlighter highlighter-primary2"><i class="fas fa-envelope-open"></i>Newsletter</span>
                    <h2 class="title mb--40 mb_sm--30">Get weekly update</h2>
                    <div class="input-group newsletter-form">
                        <div class="position-relative newsletter-inner mb--15">
                            <input placeholder="example@gmail.com" type="text">
                        </div>
                        <button type="submit" class="axil-btn mb--15">Subscribe</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- End .container -->
    </div>
    <!-- End Axil Newsletter Area  -->
</main>

<div class="service-area">
    <div class="container">
        <div class="row row-cols-xl-4 row-cols-sm-2 row-cols-1 row--20">
            <div class="col">
                <div class="service-box service-style-2">
                    <div class="icon">
                        <img src="{{asset('/assets/images/icons/service1.png')}}" alt="Service">
                    </div>
                    <div class="content">
                        <h6 class="title">Fast &amp; Secure Delivery</h6>
                        <p>Tell about your service.</p>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="service-box service-style-2">
                    <div class="icon">
                        <img src="{{asset('/assets/images/icons/service2.png')}}" alt="Service">
                    </div>
                    <div class="content">
                        <h6 class="title">Money Back Guarantee</h6>
                        <p>Within 10 days.</p>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="service-box service-style-2">
                    <div class="icon">
                        <img src="{{asset('/assets/images/icons/service3.png')}}" alt="Service">
                    </div>
                    <div class="content">
                        <h6 class="title">24 Hour Return Policy</h6>
                        <p>No question ask.</p>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="service-box service-style-2">
                    <div class="icon">
                        <img src="{{asset('/assets/images/icons/service4.png')}}" alt="Service">
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


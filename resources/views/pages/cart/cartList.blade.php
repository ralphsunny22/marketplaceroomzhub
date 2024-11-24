@extends('layout.design')
@section('title')Cart :: Marketplace @endsection

@section('extra_css')
<style>
    .axil-product-table.axil-cart-table .pro-qty-cart {
        width: auto;
    }
</style>
@endsection

@section('content')

<!-- Alert after adding to cart -->
<div id="cart-alert" class="alert alert-success text-center" style="display: none;">
    Cart Cleared Successfully!
</div>

@if (session('success'))
    <div class="alert alert-success text-center">
        {{ session('success') }}
    </div>
@endif

<main class="main-wrapper">

    <!-- Start Cart Area  -->
    <div class="axil-product-cart-area axil-section-gap">
        <div class="container">
            <div class="axil-product-cart-wrap">
                <div class="product-table-heading">
                    <h4 class="title">Your Cart</h4>
                    <a href="{{ route('clearCart') }}" class="cart-clear">Clear Shoping Cart</a>
                </div>

                @if ($cartItems)
                <form action="{{ route('updateCart') }}" method="POST">
                    @csrf
                    <div class="table-responsive">
                        <input type="hidden" name="cartId" value="{{ $cart->id }}">
                        <table class="table axil-product-table axil-cart-table mb--40">
                            <thead>
                                <tr>
                                    <th scope="col" class="product-remove"></th>
                                    <th scope="col" class="product-thumbnail">Product</th>
                                    <th scope="col" class="product-title"></th>
                                    <th scope="col" class="product-price">Price</th>
                                    <th scope="col" class="product-quantity">Quantity</th>
                                    <th scope="col" class="product-subtotal">Subtotal</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($cartItems as $productId => $details)
                                    <tr>
                                        <td class="product-remove"><a href="{{ route('removeFromCart', $productId) }}" class="remove-wishlist"><i class="fal fa-times"></i></a></td>
                                        <td class="product-thumbnail"><a href="{{ route('singleProduct', $productId) }}"><img src="{{ $details['featured_image'] }}" alt="Digital Product"></a></td>
                                        <td class="product-title"><a href="single-product.html">{{ $details['name'] }}</a></td>
                                        <td class="product-price" data-title="Price" data-price="{{$details['price']}}"><span class="currency-symbol">$</span>{{ $details['price'] }}</td>

                                        <!-- <td class="product-quantity" data-title="Qty">
                                            <div class="pro-qty">
                                                <input type="number" class="quantity-input" value="{{ $details['quantity'] }}">
                                            </div>
                                        </td> -->

                                        <td class="product-quantity" data-title="Qty">
                                            <div class="pro-qty">
                                                <!-- Include the item ID as a hidden field, so the server knows which item to update -->
                                                <input type="hidden" name="cart[{{ $productId }}][id]" value="{{ $productId }}">
                                                <!-- Input for quantity -->
                                                <input type="number" class="quantity-input" name="cart[{{ $productId }}][quantity]" value="{{ $details['quantity'] }}" min="1">
                                            </div>
                                        </td>

                                        <td class="product-subtotal" data-title="Subtotal"><span class="currency-symbol">$</span>
                                            <span>{{ $details['price'] * $details['quantity'] }}</span>
                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>

                    <div class="cart-update-btn-area">
                        <div class="input-group product-cupon">
                            <input placeholder="Enter coupon code" type="text">
                            <div class="product-cupon-btn">
                                <button type="submit" class="axil-btn btn-outline">Apply</button>
                            </div>
                        </div>
                        <div class="update-btn">
                            <button type="submit" class="axil-btn btn-outline">Update Cart</button>
                        </div>
                    </div>
                </form>

                @else
                    <div class="text-center"><p>Your cart is empty!</p></div>
                @endif

                <div class="row">
                    <div class="col-xl-5 col-lg-7 offset-xl-7 offset-lg-5">
                        <div class="axil-order-summery mt--80">
                            <h5 class="title mb--20">Order Summary</h5>
                            <div class="summery-table-wrap">
                                <table class="table summery-table mb--30">
                                    <tbody>
                                        <tr class="order-subtotal">
                                            <td>Subtotal</td>
                                            <td>${{ number_format($total, 2) }}</td>
                                        </tr>
                                        <tr class="order-shipping d-none">
                                            <td>Shipping</td>
                                            <td>
                                                <div class="input-group">
                                                    <input type="radio" id="radio1" name="shipping" checked>
                                                    <label for="radio1">Free Shippping</label>
                                                </div>
                                                <div class="input-group">
                                                    <input type="radio" id="radio2" name="shipping">
                                                    <label for="radio2">Local: $35.00</label>
                                                </div>
                                                <div class="input-group">
                                                    <input type="radio" id="radio3" name="shipping">
                                                    <label for="radio3">Flat rate: $12.00</label>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr class="order-tax">
                                            <td>Coupon Discount</td>
                                            <td>0.00</td>
                                        </tr>
                                        <tr class="order-total">
                                            <td>Total</td>
                                            <td class="order-total-amount">${{ number_format($total, 2) }}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <a href="{{ route('checkout') }}" class="axil-btn btn-bg-primary checkout-btn">Proceed to Checkout</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Cart Area  -->

</main>


<div class="service-area">
    <div class="container">
        <div class="row row-cols-xl-4 row-cols-sm-2 row-cols-1 row--20">
            <div class="col">
                <div class="service-box service-style-2">
                    <div class="icon">
                        <img src="assets/images/icons/service1.png" alt="Service">
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
                        <img src="assets/images/icons/service2.png" alt="Service">
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
                        <img src="assets/images/icons/service3.png" alt="Service">
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
                        <img src="assets/images/icons/service4.png" alt="Service">
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

@endsection
@section('extra_js')

@endsection

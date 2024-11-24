@extends('layout.design')
@section('title')Checkout :: Marketplace @endsection

@section('extra_css')@endsection

@section('content')

<!-- Alert after adding to cart -->
<div id="cart-alert" class="alert alert-success text-center" style="display: none;">
    Checkout Successfully!
</div>

<main class="main-wrapper">

    <!-- Start Checkout Area  -->
    <div class="axil-checkout-area axil-section-gap">
        <div class="container">
            <form action="{{ route('placeOrder') }}" method="POST">@csrf

                <div class="row">
                    <div class="col-lg-6">

                        {{-- axil-checkout-notice --}}
                        <div class="axil-checkout-notice">
                            @if (Auth::guest())
                            <div class="axil-toggle-box">
                                <div class="toggle-bar"><i class="fas fa-user"></i> Returning customer? <a href="javascript:void(0)" class="toggle-btn">Click here to login <i class="fas fa-angle-down"></i></a>
                                </div>
                                <div class="axil-checkout-login toggle-open">
                                    <p>If you didn't Logged in, Please Log in first.</p>
                                    <div class="signin-box">
                                        <div class="form-group">
                                            <label>Email</label>
                                            <input type="email" name="email" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label>Password</label>
                                            <input type="password" name="password" class="form-control">
                                        </div>
                                        <div class="form-group mb--0">
                                            <button type="submit" class="axil-btn btn-bg-primary submit-btn">Sign In</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endif
                            <div class="axil-toggle-box">
                                <div class="toggle-bar"><i class="fas fa-pencil"></i> Have a coupon? <a href="javascript:void(0)" class="toggle-btn">Click here to enter your code <i class="fas fa-angle-down"></i></a>
                                </div>

                                <div class="axil-checkout-coupon toggle-open">
                                    <p>If you have a coupon code, please apply it below.</p>
                                    <div class="input-group">
                                        <input placeholder="Enter coupon code" type="text">
                                        <div class="apply-btn">
                                            <button type="submit" class="axil-btn btn-bg-primary">Apply</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- axil-checkout-notice --}}

                        <div class="axil-checkout-billing">
                            <h4 class="title mb--40">Billing details</h4>
                            <div class="row d-none">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>First Name <span>*</span></label>
                                        <input type="text" id="first-name" name="first_name" class="{{ $errors->has('first_name') ? 'is-invalid' : '' }}" placeholder="Adam" value="{{old('first_name')}}">
                                        @if ($errors->has('first_name'))
                                            <div class="invalid-feedback">
                                                {{ $errors->first('first_name') }}
                                            </div>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Last Name <span>*</span></label>
                                        <input type="text" name="last_name" id="last-name" class="{{ $errors->has('last_name') ? 'is-invalid' : '' }}" placeholder="John" value="{{old('last_name')}}">
                                        @if ($errors->has('last_name'))
                                            <div class="invalid-feedback">
                                                {{ $errors->first('last_name') }}
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Country / Region <span>*</span></label>
                                <select name="billing_country" id="Region" class="{{ $errors->has('billing_country') ? 'is-invalid' : '' }}">
                                    <option value="Australia">Australia</option>
                                    <option value="United States Of America">United States (USA)</option>
                                    <option value="United Kindom">United Kindom (UK)</option>
                                    <option value="England">England</option>
                                    <option value="New Zealand">New Zealand</option>
                                    <option value="Switzerland">Switzerland</option>
                                </select>
                                @if ($errors->has('billing_country'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('last_name') }}
                                    </div>
                                @endif
                            </div>
                            <div class="form-group">
                                <label>Street Address <span>*</span></label>
                                <input type="text" name="billing_address1" id="address1" class="{{ $errors->has('billing_address1') ? 'is-invalid' : '' }}" placeholder="House number and street name" value="{{old('billing_address1')}}">
                                @if ($errors->has('billing_address1'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('billing_address1') }}
                                    </div>
                                @endif

                                <input type="text" name="billing_address2" id="address2" class="mt--15 {{ $errors->has('billing_address2') ? 'is-invalid' : '' }}" placeholder="Apartment, suite, unit, etc. (optonal)" value="{{old('billing_address2')}}">
                                @if ($errors->has('billing_address2'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('billing_address2') }}
                                    </div>
                                @endif
                            </div>
                            <div class="form-group">
                                <label>Town / City <span>*</span></label>
                                <input name="billing_city" type="text" class="{{ $errors->has('billing_city') ? 'is-invalid' : '' }}" value="{{old('billing_city')}}">
                                @if ($errors->has('billing_city'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('billing_city') }}
                                    </div>
                                @endif
                            </div>

                            <div class="form-group">
                                <label>Phone <span>*</span></label>
                                <input name="billing_phone" type="tel" class="{{ $errors->has('billing_phone') ? 'is-invalid' : '' }}" value="{{old('billing_phone')}}">
                                @if ($errors->has('billing_phone'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('billing_phone') }}
                                    </div>
                                @endif
                            </div>
                            <div class="form-group">
                                <label>Email Address <span>*</span></label>
                                <input name="billing_email" type="email" class="{{ $errors->has('billing_email') ? 'is-invalid' : '' }}" value="{{old('billing_email')}}">
                                @if ($errors->has('billing_email'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('billing_email') }}
                                    </div>
                                @endif
                            </div>
                            <div class="form-group input-group d-none">
                                <input type="checkbox" id="checkbox1" name="account-create">
                                <label for="checkbox1">Create an account</label>
                            </div>

                            {{-- shipping details --}}
                            <div class="form-group different-shippng">
                                <div class="toggle-bar">
                                    <a href="javascript:void(0)" class="toggle-btn">
                                        <input type="checkbox" id="checkbox2" name="different_ship" value="same">
                                        <label for="checkbox2">Ship to a different address?</label>
                                    </a>
                                </div>
                                <div class="toggle-open">
                                    <div class="form-group">
                                        <label>Country/ Region <span>*</span></label>
                                        <select name="shipping_country" id="Region" class="{{ $errors->has('shipping_country') ? 'is-invalid' : '' }}">
                                            <option value="Australia">Australia</option>
                                            <option value="United Kindom">United Kindom (UK)</option>
                                            <option value="United States Of America">United States (USA)</option>
                                            <option value="England">England</option>
                                            <option value="New Zealand">New Zealand</option>
                                            <option value="Switzerland">Switzerland</option>
                                        </select>
                                        @if ($errors->has('shipping_country'))
                                            <div class="invalid-feedback">
                                                {{ $errors->first('shipping_country') }}
                                            </div>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label>Street Address <span>*</span></label>
                                        <input type="text" name="shipping_address1" class="mb--15 {{ $errors->has('shipping_address1') ? 'is-invalid' : '' }}" placeholder="House number and street name" value="{{old('shipping_address1')}}">
                                        @if ($errors->has('shipping_address1'))
                                            <div class="invalid-feedback">
                                                {{ $errors->first('shipping_address1') }}
                                            </div>
                                        @endif

                                        <input type="text" name="shipping_address2" placeholder="Apartment, suite, unit, etc. (optonal)" class="{{ $errors->has('shipping_address2') ? 'is-invalid' : '' }}" value="{{old('shipping_address2')}}">
                                        @if ($errors->has('shipping_address2'))
                                            <div class="invalid-feedback">
                                                {{ $errors->first('shipping_address2') }}
                                            </div>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label>Town/ City <span>*</span></label>
                                        <input name="shipping_city" type="text" id="town" class="{{ $errors->has('shipping_city') ? 'is-invalid' : '' }}" value="{{old('shipping_city')}}">
                                        @if ($errors->has('shipping_city'))
                                            <div class="invalid-feedback">
                                                {{ $errors->first('shipping_city') }}
                                            </div>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label>Phone <span>*</span></label>
                                        <input name="shipping_phone" type="tel" id="phone" class="{{ $errors->has('shipping_phone') ? 'is-invalid' : '' }}" value="{{old('shipping_phone')}}">
                                        @if ($errors->has('shipping_phone'))
                                            <div class="invalid-feedback">
                                                {{ $errors->first('shipping_phone') }}
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            {{-- shipping details --}}

                            <div class="form-group">
                                <label>Other Notes (optional)</label>
                                <textarea name="note" id="notes" rows="2" placeholder="Notes about your order, e.g. speacial notes for delivery." class="{{ $errors->has('note') ? 'is-invalid' : '' }}"></textarea>
                                @if ($errors->has('note'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('note') }}
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>

                    {{-- order summary --}}
                    <div class="col-lg-6">
                        <div class="axil-order-summery order-checkout-summery">
                            <h5 class="title mb--20">Your Order</h5>
                            <div class="summery-table-wrap">
                                <table class="table summery-table">
                                    <thead>
                                        <tr>
                                            <th>Product</th>
                                            <th>Subtotal</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($cartItems as $id => $details)
                                        <tr class="order-product">
                                            <td>{{ $details['name'] }} <span class="quantity">x{{ $details['quantity'] }}</span></td>
                                            <td>${{ $details['price'] * $details['quantity'] }}</td>
                                        </tr>
                                        @endforeach

                                        <tr class="order-shipping d-none">
                                            <td colspan="2">
                                                <div class="shipping-amount">
                                                    <span class="title">Shipping Method</span>
                                                    <span class="amount">$35.00</span>
                                                </div>
                                                <div class="input-group">
                                                    <input type="radio" value="free_shipping" id="radio1" name="shipping_method" checked>
                                                    <label for="radio1">Free Shippping</label>
                                                </div>
                                                <div class="input-group">
                                                    <input type="radio" value="local" id="radio2" name="shipping_method">
                                                    <label for="radio2">Local</label>
                                                </div>
                                                <div class="input-group">
                                                    <input type="radio" id="radio3" name="shipping_method">
                                                    <label for="radio3">Flat rate</label>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr class="order-total">
                                            <td>Total</td>
                                            <td class="order-total-amount">${{ $total }}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="order-payment-method">
                                <div class="single-payment">
                                    <div class="input-group">
                                        <input type="radio" id="radio4" name="payment_method" value="bank_transfer">
                                        <label for="radio4">Direct bank transfer</label>
                                    </div>
                                    <p>Make your payment directly into our bank account. Please use your Order ID as the payment reference. Your order will not be shipped until the funds have cleared in our account.</p>
                                </div>
                                <div class="single-payment">
                                    <div class="input-group">
                                        <input type="radio" id="radio5" name="payment_method" value="cash_on_delivery" checked>
                                        <label for="radio5">Cash on delivery</label>
                                    </div>
                                    <p>Pay with cash upon delivery.</p>
                                </div>
                                <div class="single-payment">
                                    <div class="input-group justify-content-between align-items-center">
                                        <input type="radio" id="radio6" name="payment_method" value="stripe">
                                        <label for="radio6">Stripe</label>
                                        <img src="{{asset('/assets/images/others/payment.png')}}" alt="Paypal payment">
                                    </div>
                                    <p>Pay via Stripe; you can pay with your credit card if you don’t have a PayPal account.</p>
                                </div>
                            </div>
                            <button type="submit" class="axil-btn btn-bg-primary checkout-btn">Place Order</button>
                        </div>
                    </div>

                </div>
            </form>
        </div>
    </div>
    <!-- End Checkout Area  -->

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
<script>
    // Get the checkbox element
    const checkbox = document.getElementById('checkbox2');

    // Add an event listener to detect changes in the checkbox state
    checkbox.addEventListener('change', function() {
        // If checked, set the value to 'different', else set it to 'same'
        if (checkbox.checked) {
            checkbox.value = 'different';
        } else {
            checkbox.value = 'same';
        }
    });
</script>
@endsection

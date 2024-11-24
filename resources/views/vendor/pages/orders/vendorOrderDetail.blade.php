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

            @if(Session::has('success'))
            <div class="alert alert-success mb-3 text-center">
                {{ Session::get('success') }}
            </div>
            @endif

            <div class="row">
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

                            </div>
                            <div class="single-payment">
                                <div class="input-group">
                                    <input type="radio" id="radio5" name="payment_method" value="cash_on_delivery" checked>
                                    <label for="radio5">Cash on delivery</label>
                                </div>

                            </div>
                            <div class="single-payment">
                                <div class="input-group justify-content-between align-items-center">
                                    <input type="radio" id="radio6" name="payment_method" value="stripe">
                                    <label for="radio6">Stripe</label>
                                    <img src="{{asset('/assets/images/others/payment.png')}}" alt="Paypal payment">
                                </div>

                            </div>
                        </div>

                    </div>
                </div>

                <!---shipping details-->
                <div class="col-lg-6">

                    <div class="axil-checkout-billing">
                        <form action="{{route('updateOrderStatus',$order->id)}}" method="post">@csrf
                            <div class="d-flex justify-content-space-between align-items-baseline">
                                <select name="order_status" id="order_status" class="form-control fw-bold">
                                    <option value="{{$order->status}}" selected>{{ucFirst($order->status)}}</option>
                                    <option value="pending">Pending</option>
                                    <option value="processing">Processing</option>
                                    <option value="shipped">Shipped</option>
                                    <option value="delivered">Delivered</option>
                                    <option value="cancelled">Cancelled</option>
                                </select>
                                <button type="submit" class="axil-btn mb--15 bg-dark text-white">Update Status</button>
                            </div>
                        </form>

                        <div class="axil-dashboard-address">
                            <p class="notice-text">The following addresses was used on the checkout page.</p>
                            <div class="row row--30">
                                <div class="col-lg-6">
                                    <div class="address-info mb--40">
                                        <div class="addrss-header d-flex align-items-center justify-content-between">
                                            <h4 class="title mb-0">Shipping Address</h4>
                                            <a href="#" class="address-edit"><i class="far fa-edit"></i></a>
                                        </div>
                                        <ul class="address-details">
                                            <li>Name: {{ $order->customer->name }}</li>
                                            <li>Email: {{ $order->customer->email }}</li>
                                            <li>Phone: {{ $order->shipping_phone }}</li>
                                            <li class="mt--30">{{ $order->shipping_address1 }} <br>
                                                {{ $order->shipping_address2 }}</li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="address-info">
                                        <div class="addrss-header d-flex align-items-center justify-content-between">
                                            <h4 class="title mb-0">Billing Address</h4>
                                            <a href="#" class="address-edit"><i class="far fa-edit"></i></a>
                                        </div>
                                        <ul class="address-details">
                                            <li>Name: {{ $order->customer->name }}</li>
                                            <li>Email: {{ $order->customer->email }}</li>
                                            <li>Phone: {{ $order->shipping_phone }}</li>
                                            <li class="mt--30">{{ $order->billing_address1 }} <br>
                                                {{ $order->billing_address2 }}</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>

            </div>

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

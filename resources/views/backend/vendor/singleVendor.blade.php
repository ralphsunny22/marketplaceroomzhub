@extends('backend.layouts.design')
@section('title')Vendors @endsection

@section('extra_css')
    <style>
        .pointer{
            cursor: pointer;
        }
        .selected .sorting_1{
            color: white;
        }
    </style>
@endsection

@section('content')
<div class="container my-2">
    <!-- Business Details -->
    <div class="card mb-4">
        <div class="card-header bg-primary text-white">
            <h5 class="text-white">Business Profile</h5>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-4 text-center">
                    <img src="{{ $business->featured_logo }}" alt="Business Logo" class="img-fluid mb-3" style="width: 150px;">
                </div>
                <div class="col-md-8">
                    <h5>{{ $business->business_name }}</h5>
                    <p><strong>Business Link:</strong> {{ $business->business_link }}</p>
                    <p><strong>Address:</strong> {{ $business->business_address }}, {{ $business->business_city }}, {{ $business->business_state }}, {{ $business->business_country }}</p>
                    <p><strong>Description:</strong> {{ $business->business_description }}</p>
                    <p><strong>Status:</strong> <span class="badge bg-warning">{{ ucfirst($business->status) }}</span></p>
                </div>
            </div>
        </div>
    </div>

    <!-- Orders -->
    <div class="card mb-4">
        <div class="card-header bg-secondary text-white">
            <h5 class="text-white">Orders</h5>
        </div>
        <div class="card-body">
            @if ($business->orders->isEmpty())
                <p>No orders available.</p>
            @else
                @foreach ($business->orders as $order)
                    <div class="border p-3 mb-3">
                        <h5>Order #{{ $order->id }}</h5>
                        <p><strong>Billing Address:</strong> {{ $order->billing_address1 }}, {{ $order->billing_city }}, {{ $order->billing_country }}</p>
                        <p><strong>Shipping Address:</strong> {{ $order->shipping_address1 }}, {{ $order->shipping_city }}, {{ $order->shipping_country }}</p>
                        <p><strong>Total:</strong> ${{ $order->total }}</p>
                        <p><strong>Payment Method:</strong> {{ ucfirst(str_replace('_', ' ', $order->payment_method)) }}</p>
                        <p><strong>Status:</strong> <span class="badge bg-info">{{ ucfirst($order->status) }}</span></p>

                        <!-- Order Products -->
                        <h5>Products in Order:</h5>
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>Image</th>
                                        <th>Name</th>
                                        <th>Quantity</th>
                                        <th>Price</th>
                                        <th>Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($order->products as $productId => $product)
                                        <tr>
                                            <td><img src="{{ $product['featured_image'] }}" alt="{{ $product['name'] }}" class="img-thumbnail" style="width: 60px;"></td>
                                            <td>{{ $product['name'] }}</td>
                                            <td>{{ $product['quantity'] }}</td>
                                            <td>${{ number_format($product['price'], 2) }}</td>
                                            <td>${{ number_format($product['quantity'] * $product['price'], 2) }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
    </div>

    <!-- Products -->
    <div class="card">
        <div class="card-header bg-secondary text-white">
            <h5 class="text-white">Products</h5>
        </div>
        <div class="card-body">
            @if ($business->products->isEmpty())
                <p>No products available.</p>
            @else
                <div class="row">
                    @foreach ($business->products as $product)
                        <div class="col-md-4 mb-4">
                            <div class="card h-100">
                                <img src="{{ $product->featured_image }}" alt="{{ $product->name }}" class="card-img-top">
                                <div class="card-body">
                                    <h6 class="card-title">{{ $product->name }}</h6>
                                    <p><strong>Price:</strong> ${{ number_format($product->price, 2) }}</p>
                                    <p><strong>Quantity:</strong> {{ $product->quantity }}</p>
                                    <p>{{ $product->description }}</p>
                                </div>
                                <div class="card-footer text-center">
                                    <a href="#" class="btn btn-primary btn-sm">View Product</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
    </div>
</div>
@endsection

@section('extra_js')
<!-- Datatables init -->
<script src="{{asset('/assets/js/pages/datatables.init.js')}}"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>
<script type="text/javascript">

    $('.show_confirm').click(function(event) {
          var form =  $(this).closest("form");
          var name = $(this).data("name");
          event.preventDefault();
          swal({
              title: `Are you sure you want to delete this record?`,
              text: "If you delete this, it will be gone forever.",
              icon: "warning",
              buttons: true,
              dangerMode: true, //ok btn red color
          })
          .then((willDelete) => {
            if (willDelete) {
            form.submit();
            // confirmAlert('Removed Successfully', "success")

            } else {
                console.log('nothing');

            }
          });
    });

      function confirmAlert(title, icon) {
        swal({
            title: title,
            icon: icon,
        })
      }

</script>

@endsection


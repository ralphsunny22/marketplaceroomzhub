@extends('backend.layouts.design')
@section('title')Orders @endsection

@php

@endphp

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
<div class="content">

    {{-- @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif --}}

    @if (session('success'))
        <script type="text/javascript">
            document.addEventListener('DOMContentLoaded', function() {
                confirmAlert("{{ session('success') }}", 'success');
            });
        </script>
    @endif

    <!-- Start Content-->

        <div class="container-fluid my-3">

            <!-- Order Status Update -->
            <div class="card">
                <div class="card-body d-flex justify-content-between align-items-center">
                    <!-- Payment Method -->
                    <div>
                        <h5>Payment Method</h5>
                        <p>Cash on Delivery</p>
                    </div>
                    <form action="{{route('updateOrderStatus', $order->id)}}" method="post">@csrf
                        <!-- Order Status Update -->
                        <div class="input-group" style="max-width: 400px;">
                            <select class="form-select" name="order_status">
                                <option value="{{$order->status}}" selected>{{ucFirst($order->status)}}</option>
                                <option value="pending">Pending</option>
                                <option value="processing">Processing</option>
                                <option value="shipped">Shipped</option>
                                <option value="delivered">Delivered</option>
                                <option value="cancelled">Cancelled</option>
                            </select>
                            <button class="btn btn-success" type="submit">Update Status</button>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Order Details Header -->
            <div class="card mb-4">
                <div class="card-header bg-primary text-white">
                    <h3 class="text-white">Order Details</h3>
                </div>
                <div class="card-body">
                    <!-- Products List -->
                    <h5 class="mb-3">Products</h5>
                    <table class="table table-bordered">
                        <thead class="table-secondary">
                            <tr>
                                <th>Image</th>
                                <th>Product Name</th>
                                <th>Unit Price</th>
                                <th>Quantity</th>
                                <th>Total</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($cartItems as $id => $details)
                            <tr>
                                <td><img src="{{ $details['featured_image'] }}" alt="Product 1" class="img-fluid" style="width: 60px;"></td>
                                <td>{{ $details['name'] }}</td>
                                <td>{{$details['price']}}</td>
                                <td>{{$details['quantity']}}</td>
                                <td>${{ $details['price'] * $details['quantity'] }}</td>
                            </tr>
                            @endforeach

                        </tbody>
                        <tfoot>
                            <tr class="table-primary">
                                <td colspan="4" class="text-end"><strong>Final Total</strong></td>
                                <td><strong>${{ $total }}</strong></td>
                            </tr>
                        </tfoot>
                    </table>


                </div>
            </div>

            <!-- Vendor and Customer Details -->
            <div class="row">
                <!-- Vendor Details -->
                <div class="col-md-6">
                    <div class="card mb-4">
                        <div class="card-header bg-secondary text-white">
                            <h5 class="text-white">Vendor Details</h5>
                        </div>
                        <div class="card-body">
                            <div class="d-flex gap-2">
                                <img src="{{ $order->vendor->featured_image }}" alt="{{ $order->vendor->business_name }}" class="img-fluid mb-2" style="width: 100px;">

                                <div>
                                    <p><strong>Business Name:</strong> {{ $order->vendor->business_name }}</p>
                                    <p><strong>Address:</strong> {{ $order->vendor->business_address }}</p>
                                </div>

                            </div>

                        </div>
                    </div>
                </div>
                <!-- Customer Details -->
                <div class="col-md-6">
                    <div class="card mb-4">
                        <div class="card-header bg-secondary text-white">
                            <h5 class="text-white">Customer Details</h5>
                        </div>
                        <div class="card-body">
                            <div class="d-flex justify-content-between">
                                <!-- Billing Details -->
                                <div>
                                    <p><strong>Billing Details:</strong></p>
                                    <p>{{$order->customer->name}}</p>
                                    <p>{{$order->customer->email}}</p>
                                    <p>{{$order->shipping_phone}}</p>
                                    <p>{{$order->billing_address2}}</p>

                                </div>
                                <!-- Shipping Details -->
                                <div>
                                    <p><strong>Shipping Details:</strong></p>
                                    <p>{{$order->customer->name}}</p>
                                    <p>{{$order->customer->email}}</p>
                                    <p>{{$order->shipping_phone}}</p>
                                    <p>{{$order->shipping_address2}}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>


        </div>

     <!-- container -->

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

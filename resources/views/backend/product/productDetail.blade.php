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

    <div class="container my-5">
        <!-- Product Status -->
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h5>Product Status: <span class="badge bg-success">Available</span></h5>
            <div class="input-group" style="max-width: 300px;">
                <select class="form-select">
                    <option value="available">Available</option>
                    <option value="out-of-stock">Out of Stock</option>
                    <option value="discontinued">Discontinued</option>
                </select>
                <button class="btn btn-primary" type="button">Update Status</button>
            </div>
        </div>

        <!-- Product Details -->
        <div class="row">
            <!-- Product Images -->
            <div class="col-md-6">
                <div class="mb-4">
                    <img id="featuredImage" src="{{ $product->featured_image }}" alt="Featured Image" class="img-fluid rounded">
                </div>

                @if ($alternateImages)
                <div class="d-flex gap-2">
                    @foreach ($alternateImages as $item)
                        <img src="{{ $item }}" alt="Alternate 1" class="thumbnail img-fluid rounded" style="width: 80px;" onclick="updateFeaturedImage(this.src)">
                    @endforeach
                </div>
                @endif

            </div>

            <!-- Product Info -->
            <div class="col-md-6">
                <h2>{{$product->name}}</h2>
                <h4 class="text-success">${{$product->price}}</h4>
                <p><strong>Quantity Available:</strong> {{$product->quantity}}</p>
                <button class="btn btn-success btn-lg">Active</button>
            </div>
        </div>

        <!-- Vendor Details -->
        <div class="card mt-5">
            <div class="card-header bg-secondary text-white">
                <h5>Vendor Details</h5>
            </div>
            <div class="card-body">
                <p><strong>Vendor Name:</strong> {{$product->vendor->business_name}}</p>
                <p><strong>Vendor Address:</strong> {{$product->vendor->business_address}}</p>
            </div>
        </div>
    </div>

     <!-- container -->

</div>
@endsection

@section('extra_js')
<!-- Datatables init -->
<script src="{{asset('/assets/js/pages/datatables.init.js')}}"></script>

<script>
    function updateFeaturedImage(src) {
        const featuredImage = document.getElementById('featuredImage');
        featuredImage.src = src;
    }
</script>

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

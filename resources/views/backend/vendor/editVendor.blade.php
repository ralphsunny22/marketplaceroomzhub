@extends('backend.layouts.design')
@section('title')Vendor @endsection
@php
    use \App\CentralLogics\Helpers;
    $categories = Helpers::categories();
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
    <div class="container-fluid">

        {{-- @if(Session::has('success'))
            <div class="alert alert-success mb-3 text-center">
                {{ Session::get('success') }}
            </div>
        @endif --}}

        <div class="row d-none">
            <div class="col-12">
                <div class="page-title-box">
                    <div class="page-title-right">
                        <form class="d-flex align-items-center mb-3">
                            <div class="input-group input-group-sm">
                                <input type="text" class="form-control border" id="dash-daterange">
                                <span class="input-group-text bg-blue border-blue text-white">
                                    <i class="mdi mdi-calendar-range"></i>
                                </span>
                            </div>
                            <a href="javascript: void(0);" class="btn btn-blue btn-sm ms-2">
                                <i class="mdi mdi-autorenew"></i>
                            </a>
                            <a href="javascript: void(0);" class="btn btn-blue btn-sm ms-1">
                                <i class="mdi mdi-filter-variant"></i>
                            </a>
                        </form>
                    </div>
                    <h4 class="page-title">Vendors</h4>
                </div>
            </div>
        </div>
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="{{route('adminDashboard')}}">Dashboard</a> </li>
                            <li class="breadcrumb-item active"><a href="javascript: void(0);">Vendors</a></li>
                        </ol>
                    </div>
                    <h4 class="page-title">Edit Vendor :: {{$vendor->business_name}}</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <form action="{{route('editVendorPost', $vendor->id)}}" method="POST" enctype="multipart/form-data">@csrf
                        <div class="row">
                            <!-- Category Selection -->
                            <div class="col-lg-6">
                                <div class="form-group mb-3">
                                    <label>Select Business Category</label>
                                    <select name="category_id" class="select2 form-control {{ $errors->has('category_id') ? 'is-invalid' : '' }}">

                                        <option value="{{ isset($vendor->category_id) ?? $vendor->category_id }}">{{ isset($vendor->category_id) ? $vendor->category->name : 'Select Category' }}</option>
                                        @foreach ($categories as $item)
                                            <option value="{{$item->id}}" {{ old('category_id') == $item->id ? 'selected' : '' }}>{{$item->name}}</option>
                                        @endforeach

                                    </select>
                                    @if ($errors->has('category_id'))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('category_id') }}
                                        </div>
                                    @endif
                                </div>
                            </div>
                            <!-- end col -->

                            <!-- Business Details -->
                            <div class="col-lg-6">
                                <div class="form-group mb-3">
                                    <label>Business Name</label>
                                    <input type="text" name="business_name" class="form-control {{ $errors->has('business_name') ? 'is-invalid' : '' }}" value="{{ old('business_name') ? old('business_name') : $vendor->business_name }}">
                                    @if ($errors->has('business_name'))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('business_name') }}
                                        </div>
                                    @endif
                                </div>
                            </div>

                            <!-- Link -->
                            <div class="col-lg-6">
                                <div class="form-group mb-3">
                                    <label>Business Link</label>
                                    <input type="text" name="business_link" class="form-control {{ $errors->has('business_link') ? 'is-invalid' : '' }}" value="{{ old('business_link') ? old('business_link') : $vendor->business_link }}">
                                    @if ($errors->has('business_link'))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('business_link') }}
                                        </div>
                                    @endif
                                </div>
                            </div>

                            <!-- City -->
                            <div class="col-lg-6">
                                <div class="form-group mb-3">
                                    <label>Business City</label>
                                    <input type="text" name="business_city" class="form-control {{ $errors->has('business_city') ? 'is-invalid' : '' }}" value="{{ old('business_city') ? old('business_city') : $vendor->business_city }}">
                                    @if ($errors->has('business_city'))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('business_city') }}
                                        </div>
                                    @endif
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="form-group mb-3">
                                    <label>Business State</label>
                                    <input type="text" name="business_state" class="form-control {{ $errors->has('business_state') ? 'is-invalid' : '' }}" value="{{ old('business_state') ? old('business_state') : $vendor->business_state }}">
                                    @if ($errors->has('business_state'))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('business_state') }}
                                        </div>
                                    @endif
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="form-group mb-3">
                                    <label>Business Country</label>
                                    <input type="text" name="business_country" class="form-control {{ $errors->has('business_country') ? 'is-invalid' : '' }}" value="{{ old('business_country') ? old('business_country') : $vendor->business_country }}">
                                    @if ($errors->has('business_country'))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('business_country') }}
                                        </div>
                                    @endif
                                </div>
                            </div>

                            <div class="col-lg-12">
                                <div class="form-group mb-3">
                                    <label>Business Address</label>
                                    <input type="text" name="business_address" class="form-control {{ $errors->has('business_address') ? 'is-invalid' : '' }}" value="{{ old('business_address') ? old('business_address') : $vendor->business_address }}">
                                    @if ($errors->has('business_address'))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('business_address') }}
                                        </div>
                                    @endif
                                </div>
                            </div>

                            <!-- Main Image -->
                            <div class="col-lg-6">
                                <div class="form-group mb-3">
                                    <label>Featured Logo</label>
                                    <input type="file" name="featured_logo" class="form-control {{ $errors->has('featured_logo') ? 'is-invalid' : '' }}">
                                    @if ($errors->has('featured_logo'))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('featured_logo') }}
                                        </div>
                                    @endif

                                    @if ($vendor->featured_logo)
                                        <img src="{{ $vendor->featured_logo }}" alt="Featured Logo" width="100">
                                    @endif
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="form-group mb-3">
                                    <label>Featured Image</label>
                                    <input type="file" name="featured_image" class="form-control {{ $errors->has('featured_image') ? 'is-invalid' : '' }}">
                                    @if ($errors->has('featured_image'))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('featured_image') }}
                                        </div>
                                    @endif
                                    @if ($vendor->featured_image)
                                        <img src="{{ $vendor->featured_image }}" alt="Featured Image" width="100">
                                    @endif
                                </div>
                            </div>

                            <!-- Alternate Images -->
                            <div class="col-lg-12">
                                <div class="form-group mb-3">
                                    <label>Alternate Images</label>
                                    <input type="file" name="alternate_images[]" class="form-control {{ $errors->has('alternate_images') ? 'is-invalid' : '' }}" multiple>
                                    @if ($errors->has('alternate_images'))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('alternate_images') }}
                                        </div>
                                    @endif
                                    @if ($vendor->alternate_images)
                                        <div class="d-flex flex-wrap">
                                        {{-- @foreach (json_decode($vendor->alternate_images, true) as $index => $image) --}}
                                        @foreach ($vendor->alternate_images as $index => $image)
                                            <div class="image-wrapper me-2" data-index="{{ $index }}">
                                                <img src="{{ $image }}" alt="Alternate Image" width="100">
                                                <button type="button" class="btn btn-danger remove-image" data-index="{{ $index }}">
                                                    &times;
                                                </button>
                                            </div>

                                        @endforeach
                                        </div>
                                        <input type="hidden" name="deleted_images" id="deleted-images">
                                    @endif
                                </div>
                            </div>

                            <!-- Description -->
                            <div class="col-lg-12">
                                <div class="form-group mb-3">
                                    <label>Business Description</label>
                                    <textarea name="business_description" class="form-control {{ $errors->has('business_description') ? 'is-invalid' : '' }}" cols="30" rows="10">{{ old('business_description') ? old('business_description') : $vendor->business_description }}</textarea>
                                    @if ($errors->has('business_description'))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('business_description') }}
                                        </div>
                                    @endif
                                </div>
                            </div>

                            <div class="text-end row">
                                <div class="col-12 col-xl-12">
                                    <button type="submit" class="btn btn-info waves-effect waves-light">Update Vendor</button>
                                </div>
                            </div>


                        </div>
                        <!-- end row-->
                        </form>

                    </div> <!-- end card-body -->
                </div> <!-- end card -->
            </div><!-- end col -->
        </div>



    </div> <!-- container -->

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

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const deletedImages = [];
        const deleteButtons = document.querySelectorAll('.remove-image');

        deleteButtons.forEach(button => {
            button.addEventListener('click', function () {
                const index = this.getAttribute('data-index');
                deletedImages.push(index);
                this.parentElement.remove(); // Remove the image from the view
                document.getElementById('deleted-images').value = deletedImages.join(',');
            });
        });
    });
</script>

@endsection

@extends('vendor.layout.design')
@section('title')All Products :: MarketPlace @endsection

@section('extra_css')
<link rel="stylesheet" href="https://cdn.datatables.net/2.1.5/css/dataTables.dataTables.css">
<style>
    .dashboard-card{
        border-radius: 6px;
        margin-bottom: 15px !important;
    }
    .table-outer-right {
        display: flex;
        background-color: white;
        justify-content: end;
    }
    a.add-btn {
        border: 1px solid black;
        padding: 5px;
        border-radius: 5px;
        background-color: gray;
        color: white;
    }
    th {
        font-weight: 400;
        text-transform:capitalize;
    }
    .axil-dashboard-order .table tbody .view-btn{
        padding: 4px 10px;
    }
    .dt-length select{
        height: 40px !important;
    }
    .dt-paging nav{
        display: inline-flex !important;
    }
</style>
@endsection

@section('content')

<main class="main-wrapper">
    <!-- Start Breadcrumb Area  -->
    <div class="axil-breadcrumb-area">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-8">
                    <div class="inner">
                        <ul class="axil-breadcrumb">
                            <li class="axil-breadcrumb-item"><a href="/">Home</a></li>
                            <li class="separator"></li>
                            <li class="axil-breadcrumb-item" aria-current="page"><a href="{{ route('vendorAllProduct') }}">All Products</a></li>
                            <li class="separator"></li>
                            <li class="axil-breadcrumb-item active" aria-current="page">Add Product</li>
                        </ul>
                        <h1 class="title">Hello, Annie Taylor!</h1>
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

    <!-- Start My Account Area  -->
    <div class="axil-dashboard-area axil-section-gap">
        <div class="container">
            <div class="axil-dashboard-warp">
                <div class="axil-dashboard-author d-none">
                    <div class="media">
                        <div class="thumbnail">
                            <img src="{{asset('/assets/images/product/author1.png')}}" alt="Hello Annie">
                        </div>
                        <div class="media-body">
                            <h5 class="title mb-0">Hello Annie</h5>
                            <span class="joining-date">eTrade Member Since Sep 2020</span>
                        </div>
                    </div>
                </div>

                @if(Session::has('success'))
                    <div class="alert alert-success mb-3 text-center">
                        {{ Session::get('success') }}
                    </div>
                @endif

                <div class="axil-dashboard-account">
                    <form class="account-details-form" action="{{ route('addProductPost') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <!-- Product Name -->
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>Product Name</label>
                                    <input type="text" name="name" class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" value="{{ old('name') }}">
                                    @if ($errors->has('name'))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('name') }}
                                        </div>
                                    @endif
                                </div>
                            </div>

                            <!-- Category Selection -->
                            <div class="col-lg-4">
                                <div class="form-group mb--40">
                                    <label>Select Category</label>
                                    <select name="category_id" class="select2 form-control {{ $errors->has('category_id') ? 'is-invalid' : '' }}">
                                        <option value="">Select Category</option>
                                        <option value="1" {{ old('category_id') == 1 ? 'selected' : '' }}>Category 1</option>
                                        <option value="2" {{ old('category_id') == 2 ? 'selected' : '' }}>Category 2</option>
                                    </select>
                                    @if ($errors->has('category_id'))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('category_id') }}
                                        </div>
                                    @endif
                                </div>
                            </div>

                            <!-- Unit Price -->
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label>Unit Price</label>
                                    <input type="text" name="price" class="form-control {{ $errors->has('price') ? 'is-invalid' : '' }}" value="{{ old('price') }}">
                                    @if ($errors->has('price'))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('price') }}
                                        </div>
                                    @endif
                                </div>
                            </div>

                            <!-- Quantity -->
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label>Quantity</label>
                                    <input type="text" name="quantity" class="form-control {{ $errors->has('quantity') ? 'is-invalid' : '' }}" value="{{ old('quantity') }}">
                                    @if ($errors->has('quantity'))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('quantity') }}
                                        </div>
                                    @endif
                                </div>
                            </div>

                            <!-- Main Image -->
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Featured Image</label>
                                    <input type="file" name="featured_image" class="form-control {{ $errors->has('featured_image') ? 'is-invalid' : '' }}">
                                    @if ($errors->has('featured_image'))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('featured_image') }}
                                        </div>
                                    @endif
                                </div>
                            </div>

                            <!-- Alternate Images -->
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Alternate Images</label>
                                    <input type="file" name="alternate_images[]" class="form-control {{ $errors->has('alternate_images') ? 'is-invalid' : '' }}" multiple>
                                    @if ($errors->has('alternate_images'))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('alternate_images') }}
                                        </div>
                                    @endif
                                </div>
                            </div>

                            <!-- Description -->
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>Description</label>
                                    <textarea name="description" class="form-control {{ $errors->has('description') ? 'is-invalid' : '' }}" cols="30" rows="10">{{ old('description') }}</textarea>
                                    @if ($errors->has('description'))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('description') }}
                                        </div>
                                    @endif
                                </div>
                            </div>

                            <!-- Specifications -->
                            <div class="col-lg-12">
                                <div class="specification-area">
                                    @foreach(old('specifications', ['']) as $key => $specification)
                                        <div class="form-group specification-group">
                                            <div class="row">
                                                <div class="col-lg-11">
                                                    <label>Specifications</label>
                                                    <input type="text" name="specifications[]" class="form-control {{ $errors->has("specifications.$key") ? 'is-invalid' : '' }}" value="{{ $specification }}">
                                                    @if ($errors->has("specifications.$key"))
                                                        <div class="invalid-feedback">
                                                            {{ $errors->first("specifications.$key") }}
                                                        </div>
                                                    @endif
                                                </div>
                                                <div class="col-lg-1">
                                                    <button type="button" class="btn btn-danger remove-btn" style="{{ $key === 0 ? 'display:none;' : '' }}"><i class="fas fa-times"></i></button>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                                <button type="button" class="btn btn-primary add-btn" style="width: 30%;">Add Specification</button>
                            </div>

                            <div class="form-group mb--0 d-flex justify-content-center">
                                <button type="submit" class="axil-btn bg-primary text-white" style="width: 30%">Save Item</button>
                                {{-- <input type="submit" class="axil-btn" value=""> --}}
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
    <!-- End My Account Area  -->

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

@endsection

@section('extra_js')
<script src="https://cdn.datatables.net/2.1.5/js/dataTables.js"></script>
<script>new DataTable('#example');</script>
<script>

document.addEventListener('DOMContentLoaded', function () {
    // Add button functionality
    document.querySelector('.add-btn').addEventListener('click', function () {
        // Clone the specification-group div
        const specificationGroup = document.querySelector('.specification-group').cloneNode(true);

        // Clear the cloned input field
        specificationGroup.querySelector('input').value = '';

        // Show the remove button for the cloned specification group
        specificationGroup.querySelector('.remove-btn').style.display = 'inline-block';

        // Append the cloned specification group to the specification area
        document.querySelector('.specification-area').appendChild(specificationGroup);
    });

    // Event delegation to handle remove button click
    document.querySelector('.specification-area').addEventListener('click', function (e) {
        if (e.target && e.target.classList.contains('remove-btn')) {
            e.target.closest('.specification-group').remove();
        }
    });
});
</script>

@endsection

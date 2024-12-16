@extends('vendor.layout.design')
@section('title')Vendor :: MarketPlace @endsection

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
    .newsletter-inner textarea {
        padding-left: 66px;
        width: 65%;

        font-size: 14px;
        font-weight: 400;
        height: auto;
        line-height: 30px;
        background: #fff;
        -webkit-box-shadow: none;
        box-shadow: none;
        padding: 0 30px;
        outline: none;
        border: 1px solid black;
        border-radius: 5px;
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
                            <li class="axil-breadcrumb-item"><a href="index.html">Home</a></li>
                            <li class="separator"></li>
                            <li class="axil-breadcrumb-item active" aria-current="page">Vendor Dashbaord</li>
                        </ul>
                        <h1 class="title">Hello, {{ $authUser?->name }}!</h1>
                    </div>
                </div>
                <div class="col-lg-6 col-md-4">
                    <div class="inner">
                        <div class="bradcrumb-thumb">
                            <img src="{{$vendor->featured_logo ? $vendor->featured_logo : $vendor->featured_image }}" alt="Image" style="width: 110px; height: 110px; border-radius: 110px;">
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

                <div class="axil-dashboard-overview">
                    <div class="row">
                        <div class="col-lg-3">
                            <div class="form-group border text-center p-3 dashboard-card">
                                <h5>Revenue</h5>
                                <div>0</div>
                            </div>
                        </div>

                        <div class="col-lg-3">
                            <div class="form-group border text-center p-3 dashboard-card">
                                <h5>Sales</h5>
                                <div>0</div>
                            </div>
                        </div>

                        <div class="col-lg-3">
                            <div class="form-group border text-center p-3 dashboard-card">
                                <h5>Profit</h5>
                                <div>0</div>
                            </div>
                        </div>

                        <div class="col-lg-3">
                            <div class="form-group border text-center p-3 dashboard-card">
                                <h5>Loss</h5>
                                <div>0</div>
                            </div>
                        </div>

                        <div class="col-lg-3">
                            <div class="form-group border text-center p-3 dashboard-card">
                                <h5>Customers</h5>
                                <div>0</div>
                            </div>
                        </div>

                        <div class="col-lg-3">
                            <a href="{{ route('vendorAllProduct') }}">
                            <div class="form-group border text-center p-3 dashboard-card">
                                <h5>Products</h5>
                                <div>0</div>
                            </div>
                            </a>
                        </div>

                        <div class="col-lg-3">
                            <a href="{{route('vendorOrders')}}">
                            <div class="form-group border text-center p-3 dashboard-card">
                                <h5>Orders</h5>
                                <div>0</div>
                            </div>
                            </a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- End My Account Area  -->

    <!-- Start Axil Newsletter Area  -->
    <div class="axil-newsletter-area axil-section-gap pt--0 d-none">
        <div class="container">
            <div class="etrade-newsletter-wrapper bg_image bg_image--5">
                <div class="newsletter-content">
                    <span class="title-highlighter highlighter-primary2"><i class="fas fa-envelope-open"></i>Contact Us</span>
                    <h2 class="title mb--40 mb_sm--30">Need Help?</h2>
                    <div class="input-group newsletter-form d-none">
                        <div class="position-relative newsletter-inner mb--15">
                            <input placeholder="example@gmail.com" type="text">
                        </div>
                        <button type="submit" class="axil-btn mb--15">Submit</button>
                    </div>

                    <div class="newsletter-form d-block">
                        <div class="input-group newsletter-form">
                            <div class="position-relative newsletter-inner mb--15">
                                <input placeholder="Title" type="text">
                            </div>
                            <button type="submit" class="axil-btn mb--15">Submit</button>
                        </div>
                        <div class="newsletter-inner mb--15">
                            <textarea name="business_description" class="form-control {{ $errors->has('business_description') ? 'is-invalid' : '' }}" cols="5" rows="5">{{ old('business_description') }}</textarea>
                        </div>

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

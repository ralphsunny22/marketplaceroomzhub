@extends('layout.design')
@section('title')All Products :: MarketPlace @endsection

@php
    use \App\CentralLogics\Helpers;
    $categories = Helpers::categories();
@endphp

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
                            <li class="axil-breadcrumb-item"><a href="index.html">Home</a></li>
                            <li class="separator"></li>
                            <li class="axil-breadcrumb-item active" aria-current="page">My Account</li>
                        </ul>
                        <h1 class="title">Account Settings</h1>
                    </div>
                </div>
                <div class="col-lg-6 col-md-4">
                    <div class="inner">
                        <div class="bradcrumb-thumb">
                            <img src="assets/images/product/product-45.png" alt="Image">
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
                <div class="axil-dashboard-author">
                    <div class="media">
                        <div class="thumbnail">
                            <img src="assets/images/product/author1.png" alt="Hello Annie">
                        </div>
                        <div class="media-body">
                            <h5 class="title mb-0">Hello {{ Auth::user()->name }}</h5>
                            <span class="joining-date">Member Since {{ Auth::user()->created_at }}</span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-3 col-md-4">
                        <aside class="axil-dashboard-aside">
                            <nav class="axil-dashboard-nav">
                                <div class="nav nav-tabs" role="tablist">
                                    <a class="nav-item nav-link active" data-bs-toggle="tab" href="#nav-account" role="tab" aria-selected="false"><i class="fas fa-user"></i>Account Details</a>

                                    <a class="nav-item nav-link" href="sign-in.html"><i class="fal fa-sign-out"></i>Logout</a>
                                </div>
                            </nav>
                        </aside>
                    </div>
                    <div class="col-xl-9 col-md-8">
                        <div class="tab-content">

                            <div class="tab-pane fade show active" id="nav-account" role="tabpanel">
                                <div class="col-lg-9">
                                    <div class="axil-dashboard-account">
                                        <form class="account-details-form">
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label>Full Name</label>
                                                        <input type="text" name="name" class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" value="{{ old('name') ? old('name') : Auth::user()->name }}">
                                                        @if ($errors->has('name'))
                                                            <div class="invalid-feedback">
                                                                {{ $errors->first('name') }}
                                                            </div>
                                                        @endif
                                                    </div>
                                                </div>

                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label>Email</label>
                                                        <input type="text" name="email" class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" value="{{ old('email') ? old('email') : Auth::user()->email }}">
                                                        @if ($errors->has('email'))
                                                            <div class="invalid-feedback">
                                                                {{ $errors->first('email') }}
                                                            </div>
                                                        @endif
                                                    </div>
                                                </div>

                                                <div class="col-12">
                                                    <h5 class="title">Password Change</h5>

                                                    <div class="form-group">
                                                        <label>New Password</label>
                                                        <input type="password" name="password" class="form-control">
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Confirm New Password</label>
                                                        <input type="password" name="confirm_password" class="form-control">
                                                    </div>
                                                    <div class="form-group mb--0">
                                                        <input type="submit" class="axil-btn" value="Save Changes">
                                                    </div>
                                                </div>
                                            </div>
                                        </form>


                                    </div>
                                </div>
                            </div>

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

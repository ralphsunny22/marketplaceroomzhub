@extends('layout.design')
@section('title')Order Confirmation :: Marketplace @endsection

@section('extra_css')@endsection

@section('content')
<main class="main-wrapper">
{{-- <div class="comming-soon-area">

    <div class="row align-items-center">
        <div class="col-xl-4 col-lg-6">
            <div class="{{asset('/comming-soon-banner bg_image bg_image--13')}}"></div>
        </div>
        <div class="col-lg-5 offset-xl-1">
            <div class="comming-soon-content">
                <div class="brand-logo">
                    <img src="{{asset('/assets/images/logo/logo-large.png')}}" alt="Logo">
                </div>
                <h2 class="title">Our new website is on the way</h2>
                <p>We're coming soon! We're working hard to give you <br>the best experince.</p>
                <div class="coming-countdown countdown"></div>
                <form>
                    <div class="input-group newsletter-form">
                        <div class="position-relative newsletter-inner mb--15">
                            <input placeholder="example@gmail.com" type="text">
                        </div>
                        <button type="submit" class="axil-btn mb--15">Subscribe</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div> --}}
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
                    <h1 class="title">Hello, Customer!</h1>
                </div>
            </div>
            <div class="col-lg-6 col-md-4">
                <div class="inner">
                    <div class="bradcrumb-thumb">
                        <img src="{{asset('/assets/images/icons/purchasing.png')}}" alt="Image" style="width: 20%;">
                        {{-- <span style='font-size:100px;'>&#127873;</span> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Breadcrumb Area  -->

<div class="axil-dashboard-area axil-section-gap">
    <div class="container">
        <div class="axil-dashboard-warp">
            <div class="row align-items-center">

                <div class="col-lg-12">
                    <div class="comming-soon-content">
                        <h2 class="title">Order placed successfully!</h2>
                        <p>We'll get back to you as soon as possible. <br><a href="">Thank you.</a></p>

                        <form>
                            <div class="input-group newsletter-form">
                                <button type="submit" class="axil-btn mb--15">Continue Shopping</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</main>
@endsection

@section('extra_js')
@endsection

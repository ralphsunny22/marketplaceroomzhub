@extends('layout.design')
@section('title')Order Cancel :: Marketplace @endsection

@section('extra_css')@endsection

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
                        <h2 class="title">Order was not successfull</h2>
                        <p>Try again to place an order. <br><a href="javascript:void(0)">Thank you.</a></p>


                        <div class="input-group newsletter-form">
                            <a href="{{route('checkout')}}" class="axil-btn mb--15">Go Back</a>
                        </div>

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

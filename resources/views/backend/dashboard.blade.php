@extends('backend.layouts.design')
@section('title')Dashboard @endsection

@section('extra_css')@endsection

@section('content')
<div class="content">

    <!-- Start Content-->
    <div class="container-fluid">

        <div class="row">
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
                    <h4 class="page-title">Dashboard</h4>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6 col-xl-3">
                <div class="widget-rounded-circle card">
                    <div class="card-body">
                        <div class="row">

                            <div class="col-12">
                                <div class="text-center">
                                    <h3 class="text-dark mt-1"><span data-plugin="counterup">{{ $users }}</span></h3>
                                    <p class="text-muted mb-1 text-truncate">Total Users</p>
                                </div>
                            </div>
                        </div> <!-- end row-->
                    </div>
                </div> <!-- end widget-rounded-circle-->
            </div> <!-- end col-->

            <div class="col-md-6 col-xl-3">
                <div class="widget-rounded-circle card">
                    <div class="card-body">
                        <div class="row">

                            <div class="col-12">
                                <div class="text-center">
                                    <h3 class="text-dark mt-1"><span data-plugin="counterup">{{ $products }}</span></h3>
                                    <p class="text-muted mb-1 text-truncate">Total Products</p>
                                </div>
                            </div>
                        </div> <!-- end row-->
                    </div>
                </div> <!-- end widget-rounded-circle-->
            </div> <!-- end col-->

            <div class="col-md-6 col-xl-3">
                <div class="widget-rounded-circle card">
                    <div class="card-body">
                        <div class="row">

                            <div class="col-12">
                                <div class="text-center">
                                    <h3 class="text-dark mt-1"><span data-plugin="counterup">{{ $productPending }}</span></h3>
                                    <p class="text-muted mb-1 text-truncate">Product Pending</p>
                                </div>
                            </div>
                        </div> <!-- end row-->
                    </div>
                </div> <!-- end widget-rounded-circle-->
            </div> <!-- end col-->

            <div class="col-md-6 col-xl-3">
                <div class="widget-rounded-circle card">
                    <div class="card-body">
                        <div class="row">

                            <div class="col-12">
                                <div class="text-center">
                                    <h3 class="text-dark mt-1"><span data-plugin="counterup">{{ $productFeatured }}</span></h3>
                                    <p class="text-muted mb-1 text-truncate">Product Featured</p>
                                </div>
                            </div>
                        </div> <!-- end row-->
                    </div>
                </div> <!-- end widget-rounded-circle-->
            </div> <!-- end col-->

            <div class="col-md-6 col-xl-3">
                <div class="widget-rounded-circle card">
                    <div class="card-body">
                        <div class="row">

                            <div class="col-12">
                                <div class="text-center">
                                    <h3 class="text-dark mt-1"><span data-plugin="counterup">{{ $vendors }}</span></h3>
                                    <p class="text-muted mb-1 text-truncate">Total Vendors</p>
                                </div>
                            </div>
                        </div> <!-- end row-->
                    </div>
                </div> <!-- end widget-rounded-circle-->
            </div> <!-- end col-->

            <div class="col-md-6 col-xl-3">
                <div class="widget-rounded-circle card">
                    <div class="card-body">
                        <div class="row">

                            <div class="col-12">
                                <div class="text-center">
                                    <h3 class="text-dark mt-1"><span data-plugin="counterup">{{ $vendorPending }}</span></h3>
                                    <p class="text-muted mb-1 text-truncate">Vendor Pending</p>
                                </div>
                            </div>
                        </div> <!-- end row-->
                    </div>
                </div> <!-- end widget-rounded-circle-->
            </div> <!-- end col-->

            <div class="col-md-6 col-xl-3">
                <div class="widget-rounded-circle card">
                    <div class="card-body">
                        <div class="row">

                            <div class="col-12">
                                <div class="text-center">
                                    <h3 class="text-dark mt-1"><span data-plugin="counterup">{{ $vendorConfirmed }}</span></h3>
                                    <p class="text-muted mb-1 text-truncate">Vendor Confirmed</p>
                                </div>
                            </div>
                        </div> <!-- end row-->
                    </div>
                </div> <!-- end widget-rounded-circle-->
            </div> <!-- end col-->

            <div class="col-md-6 col-xl-3">
                <div class="widget-rounded-circle card">
                    <div class="card-body">
                        <div class="row">

                            <div class="col-12">
                                <div class="text-center">
                                    <h3 class="text-dark mt-1"><span data-plugin="counterup">{{ $vendorSuspended }}</span></h3>
                                    <p class="text-muted mb-1 text-truncate">Vendor Suspended</p>
                                </div>
                            </div>
                        </div> <!-- end row-->
                    </div>
                </div> <!-- end widget-rounded-circle-->
            </div> <!-- end col-->

            <div class="col-md-6 col-xl-3">
                <div class="widget-rounded-circle card">
                    <div class="card-body">
                        <div class="row">

                            <div class="col-12">
                                <div class="text-center">
                                    <h3 class="text-dark mt-1"><span data-plugin="counterup">{{ $customers }}</span></h3>
                                    <p class="text-muted mb-1 text-truncate">Customers</p>
                                </div>
                            </div>
                        </div> <!-- end row-->
                    </div>
                </div> <!-- end widget-rounded-circle-->
            </div> <!-- end col-->

            <div class="col-md-6 col-xl-3">
                <div class="widget-rounded-circle card">
                    <div class="card-body">
                        <div class="row">

                            <div class="col-12">
                                <div class="text-center">
                                    <h3 class="text-dark mt-1"><span data-plugin="counterup">{{ $orders }}</span></h3>
                                    <p class="text-muted mb-1 text-truncate">Total orders</p>
                                </div>
                            </div>
                        </div> <!-- end row-->
                    </div>
                </div> <!-- end widget-rounded-circle-->
            </div> <!-- end col-->

            <div class="col-md-6 col-xl-3">
                <div class="widget-rounded-circle card">
                    <div class="card-body">
                        <div class="row">

                            <div class="col-12">
                                <div class="text-center">
                                    <h3 class="text-dark mt-1"><span data-plugin="counterup">{{ $orderPending }}</span></h3>
                                    <p class="text-muted mb-1 text-truncate">Order Pending</p>
                                </div>
                            </div>
                        </div> <!-- end row-->
                    </div>
                </div> <!-- end widget-rounded-circle-->
            </div> <!-- end col-->

            <div class="col-md-6 col-xl-3">
                <div class="widget-rounded-circle card">
                    <div class="card-body">
                        <div class="row">

                            <div class="col-12">
                                <div class="text-center">
                                    <h3 class="text-dark mt-1"><span data-plugin="counterup">{{ $orderDelivered }}</span></h3>
                                    <p class="text-muted mb-1 text-truncate">Order Delivered</p>
                                </div>
                            </div>
                        </div> <!-- end row-->
                    </div>
                </div> <!-- end widget-rounded-circle-->
            </div> <!-- end col-->

            <div class="col-md-6 col-xl-3">
                <div class="widget-rounded-circle card">
                    <div class="card-body">
                        <div class="row">

                            <div class="col-12">
                                <div class="text-center">
                                    <h3 class="text-dark mt-1"><span data-plugin="counterup">{{ $orderCancelled }}</span></h3>
                                    <p class="text-muted mb-1 text-truncate">Order Cancelled</p>
                                </div>
                            </div>
                        </div> <!-- end row-->
                    </div>
                </div> <!-- end widget-rounded-circle-->
            </div> <!-- end col-->

        </div>
        <!-- end row-->



    </div> <!-- container -->

</div>
@endsection

@section('extra_js')@endsection

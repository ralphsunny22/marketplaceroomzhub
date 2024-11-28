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
                            <li class="axil-breadcrumb-item active" aria-current="page">All Products</li>
                        </ul>
                        <h1 class="title">Hello, {{$owner->name}}!</h1>
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
                            <h5 class="title mb-0">Hello {{$owner->name}}</h5>
                            <span class="joining-date">Member Since {{ $owner->created_at->format('F Y') }}
                            </span>
                        </div>
                    </div>
                </div>

                <div class="axil-dashboard-order">
                    <div class="table-outer-right">
                        <a href="{{ route('addProduct') }}" class="add-btn bg-primary border border-primary">Add Product</a>
                    </div>

                    <div class="table-responsive">
                        <table id="example" class="table display" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Unit Price($)</th>
                                    <th>Quantity</th>
                                    <th>Status</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (count($products) > 0)
                                    @foreach ($products as $item)
                                    <tr>
                                        <td><a href="{{ route('singleProduct', $item->id) }}">{{ $item->name }}</a></td>
                                        <td>{{ $item->price }}</td>
                                        <td>{{ $item->quantity }}</td>
                                        <td><span class="badge bg-success">Active</span></td>
                                        <td class="d-flex justify-content-center">
                                            <a href="{{ route('editProdduct', $item->id) }}" class="axil-btn view-btn me-1">Edit</a>
                                            <a href="#" class="axil-btn view-btn">Delete</a>
                                        </td>
                                    </tr>
                                    @endforeach
                                @endif
                            </tbody>
                            {{-- <tfoot>
                                <tr>
                                    <th>Name</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </tfoot> --}}
                        </table>
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

@endsection

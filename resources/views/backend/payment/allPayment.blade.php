@extends('backend.layouts.design')
@section('title')Payments @endsection

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
                    <h4 class="page-title">All Payments</h4>
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
                            <li class="breadcrumb-item active"><a href="javascript: void(0);">Payments</a></li>
                        </ol>
                    </div>
                    <h4 class="page-title">All Payments</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <!-- table part-->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <h4 class="header-title">All Payments</h4>
                        <p class="text-muted font-13 mb-4">
                            This shows the list of payment listings.
                        </p>

                        <div>
                            <table id="datatable-buttons" class="table table-striped nowrap w-100" style="overflow-x: auto;">
                                <thead>
                                    <tr>
                                        <th>S/N</th>
                                        <th style="text-align: center">User</th>
                                        <th>Subscription Plan</th>

                                        <th>Paid At</th>
                                        <th>Status</th>


                                        {{-- <th>Total bedroom</th>
                                        <th>Total bathroom</th>
                                        <th>Rent per week($)</th> --}}
                                    </tr>
                                </thead>

                                <tbody>
                                    @if (count($payments) > 0)
                                        @foreach ($payments as $key=>$item)
                                            @php
                                                $key++
                                            @endphp
                                            <tr>
                                                <td>{{$key}}</td>
                                                <td style="text-align: center">
                                                    @if ($item->createdBy->profile_picture)
                                                        <img src="{{ $item->created_by->profile_picture }}" alt="Profile Picture" style="width: 25px; height: 25px; border-radius: 5px;">
                                                    @else
                                                        <div style="font-size: 24px; text-align:center;"><i class="fa fa-user-circle-o"></i></div>
                                                    @endif
                                                    <h5>{{ $item->createdBy->name }}</h5>

                                                </td>
                                                <td>
                                                    {{ $item->subscription_plan->title }}
                                                </td>

                                                <td>{{ $item->created_at->format('D, M j, Y g:i A') }}</td>

                                                <td>Paid</td>

                                            </tr>

                                        @endforeach
                                    @endif
                                </tbody>
                            </table>
                        </div>

                    </div> <!-- end card body-->
                </div> <!-- end card -->
            </div><!-- end col-->
        </div>
        <!-- end row-->
        <!-- end row-->



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

@endsection

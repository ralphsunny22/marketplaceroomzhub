<!doctype html>
<html class="no-js" lang="en">


<!-- Mirrored from new.axilthemes.com/demo/template/etrade/sign-in.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 31 Aug 2024 09:29:22 GMT -->
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>eTrade || Sign In</title>
    <meta name="robots" content="noindex, follow" />
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('/assets/images/favicon.png')}}">

    <!-- CSS
    ============================================ -->

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{asset('/assets/css/vendor/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('/assets/css/vendor/font-awesome.css')}}">
    <link rel="stylesheet" href="{{asset('/assets/css/vendor/flaticon/flaticon.css')}}">
    <link rel="stylesheet" href="{{asset('/assets/css/vendor/slick.css')}}">
    <link rel="stylesheet" href="{{asset('/assets/css/vendor/slick-theme.css')}}">
    <link rel="stylesheet" href="{{asset('/assets/css/vendor/jquery-ui.min.css')}}">
    <link rel="stylesheet" href="{{asset('/assets/css/vendor/sal.css')}}">
    <link rel="stylesheet" href="{{asset('/assets/css/vendor/magnific-popup.css')}}">
    <link rel="stylesheet" href="{{asset('/assets/css/vendor/base.css')}}">
    <link rel="stylesheet" href="{{asset('/assets/css/style.min.css')}}">

</head>


<body>
    <div class="axil-signin-area">

        <!-- Start Header -->
        <div class="signin-header">
            <div class="row align-items-center">
                <div class="col-sm-4">
                    <a href="index.html" class="site-logo d-none"><img src="assets/images/logo/logo.png" alt="logo"></a>
                    <a href="/">
                        <h4>RoomzHub Marketplace</h4>
                    </a>
                </div>
                <div class="col-sm-8">
                    <div class="singin-header-btn">
                        <p>Already a member?</p>
                        <a href="{{ route('login') }}" class="axil-btn btn-bg-secondary sign-up-btn">Sign In Now</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Header -->

        <div class="row">
            <div class="col-xl-4 col-lg-6">
                <div class="axil-signin-banner bg_image bg_image--9">
                    <h3 class="title">We Offer the Best Products</h3>
                </div>
            </div>
            <div class="col-lg-6 offset-xl-2">
                <div class="axil-signin-form-wrap">
                    <div class="axil-signin-form">
                        <h3 class="title">Sign Up to Marketplace.</h3>
                        <p class="b2 mb--55">Enter your detail below</p>
                        <form class="singin-form" action="{{ route('registerPost') }}" method="POST">@csrf
                            <div class="form-group">
                                <label>Name</label>
                                <input type="text" class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" name="name" value="{{ old('name') }}">
                                @if ($errors->has('name'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('name') }}
                                    </div>
                                @endif
                            </div>

                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" name="email" value="{{ old('email') }}">
                                @if ($errors->has('email'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('email') }}
                                    </div>
                                @endif
                            </div>

                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}" name="password" value="{{ old('password') }}">
                                @if ($errors->has('password'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('password') }}
                                    </div>
                                @endif
                            </div>
                            <div class="form-group d-flex align-items-center justify-content-between">
                                <button type="submit" class="axil-btn btn-bg-primary submit-btn">Create account</button>

                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- JS ============================================ -->
    <!-- Modernizer JS -->
    <script src="{{asset('/assets/js/vendor/modernizr.min.js')}}"></script>
    <!-- jQuery JS -->
    <script src="{{asset('/assets/js/vendor/jquery.js')}}"></script>
    <!-- Bootstrap JS -->
    <script src="{{asset('/assets/js/vendor/popper.min.js')}}"></script>
    <script src="{{asset('/assets/js/vendor/bootstrap.min.js')}}"></script>
    <script src="{{asset('/assets/js/vendor/slick.min.js')}}"></script>
    <script src="{{asset('/assets/js/vendor/js.cookie.js')}}"></script>
    <!-- <script src="/assets/js/vendor/jquery.style.switcher.js"></script> -->
    <script src="{{asset('/assets/js/vendor/jquery-ui.min.js')}}"></script>
    <script src="{{asset('/assets/js/vendor/jquery.ui.touch-punch.min.js')}}"></script>
    <script src="{{asset('/assets/js/vendor/jquery.countdown.min.js')}}"></script>
    <script src="{{asset('/assets/js/vendor/sal.js')}}"></script>
    <script src="{{asset('/assets/js/vendor/jquery.magnific-popup.min.js')}}"></script>
    <script src="{{asset('/assets/js/vendor/imagesloaded.pkgd.min.js')}}"></script>
    <script src="{{asset('/assets/js/vendor/isotope.pkgd.min.js')}}"></script>
    <script src="{{asset('/assets/js/vendor/counterup.js')}}"></script>
    <script src="{{asset('/assets/js/vendor/waypoints.min.js')}}"></script>

    <!-- Main JS -->
    <script src="{{asset('/assets/js/main.js')}}"></script>

</body>


<!-- Mirrored from new.axilthemes.com/demo/template/etrade/sign-in.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 31 Aug 2024 09:29:22 GMT -->
</html>

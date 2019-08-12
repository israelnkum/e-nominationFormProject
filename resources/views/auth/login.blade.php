<!doctype html>
<html class="no-js " lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <meta name="description" content="Responsive Bootstrap 4 and web Application ui kit.">

    <title>E-Voting | Nomination Form</title>
    <!-- Favicon-->
    <link rel="icon" href="favicon.ico" type="image/x-icon">
    <!-- Custom Css -->
    <link rel="stylesheet" href="{{asset('assets/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/main.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/authentication.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/color_skins.css')}}">
</head>

<body class="theme-purple authentication sidebar-collapse">
<div class="page-header">
    <div class="page-header-image" style="background-image:url({{asset('assets/img/vote.jpg')}})"></div>
    <div class="container">
        <div class="col-md-12 content-center">
            <div class="card-plain" style="background: rgba(0,0,0,0.9); padding: 30px;">
                <form class="form" method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="header">
                        <div class="logo-container">
                            <img src="{{asset('assets/img/e-voting.png')}}" alt="">
                        </div>
                        <h6 style="font-weight: lighter">Nomination Form</h6>
                    </div>
                    <div class="content">
                        <div class="input-group input-lg">
                            <input style="border-radius: 0px;" placeholder="Index number" id="username" type="text" class="form-control{{ $errors->has('username') ? ' is-invalid' : '' }}" name="username" value="{{ old('username') }}" required autofocus>
                            <span class="input-group-addon">
                                <i class="zmdi zmdi-account-circle"></i>
                            </span>
                            @if ($errors->has('username'))
                                <span class="invalid-feedback text-info" role="alert">
                                        <strong>{{ $errors->first('username') }}</strong>
                                    </span>
                            @endif
                        </div>
                        <div class="input-group input-lg">
                            <input style="border-radius: 0px;" placeholder="Password" id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
                            <span class="input-group-addon">
                                <i class="zmdi zmdi-lock"></i>
                            </span>
                            @if ($errors->has('password'))
                                <span class="invalid-feedback text-info" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>
                    <div class="footer text-center">
                        <button type="submit" class="btn btn-simple btn-secondary">LOGIN</button>
                        <h5><a href="forgot-password.html" class="link">Forgot Password?</a></h5>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <footer class="footer">
        <div class="container">
            <nav>
                <ul>
                    <li><small>E-Voting | Nomination Form</small></li>
                </ul>
            </nav>
            <div class="copyright">
                &copy;{{date('Y')}},
                <span>Designed by <a href="javascript:void(0)" target="_blank">ANA Technologies</a></span>
            </div>
        </div>
    </footer>
</div>

<!-- Jquery Core Js -->
<script src="{{asset('assets/bundles/libscripts.bundle.js')}}"></script>
<script src="{{asset('assets/bundles/vendorscripts.bundle.js')}}"></script> <!-- Lib Scripts Plugin Js -->

<script>
    $(".navbar-toggler").on('click',function() {
        $("html").toggleClass("nav-open");
    });
    //=============================================================================
    $('.form-control').on("focus", function() {
        $(this).parent('.input-group').addClass("input-group-focus");
    }).on("blur", function() {
        $(this).parent(".input-group").removeClass("input-group-focus");
    });
</script>
</body>
</html>
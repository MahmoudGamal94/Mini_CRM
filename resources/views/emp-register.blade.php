<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Employee Registration</title>
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}"/>
    <link rel="stylesheet" href="{{asset('css/style.css')}}"/>
    <link rel="stylesheet" href="{{asset('colors/color1.scss')}}"/>
    <link rel="stylesheet" href="{{asset('css/icons.css')}}"/>
</head>
<body class="app sidebar-mini ltr">
<!-- BACKGROUND-IMAGE -->
<div class="login-img">

    <h1 class="float-left m-3 p-3"><a href="{{route('dashboard')}}" style="color: #ffffff;font-size: 2rem"><i class="mdi mdi-home" style="color: #ffffff;font-size: 3rem" aria-hidden="true"></i>Home</a></h1>
    <!-- GLOABAL LOADER -->
    <div id="global-loader">
        <img src="{{asset('images/loader.svg')}}" class="loader-img" alt="Loader">
    </div>
    <!-- /GLOABAL LOADER -->

    <!-- PAGE -->
    <div class="page">
        <!-- CONTAINER OPEN -->
            <div class="mx-auto mt-3">
                <div class="text-center">
                    <img src="{{asset('images/logo-white.png')}}" class="header-brand-img m-0" alt="">
                </div>
            </div>
            <div class="container-login100">
                <div class="wrap-login100 p-5 shadow-xl rounded-lg w-30">
                    <div class="alert @if(isset($status)) @if($status=="success"){{"alert-success"}} @else {{"alert-danger"}} @endif @endif" role="alert">
                        {{isset($message) ? $message : "" }}
                    </div>
                    <form class="login100-form validate-form" action="{{route('create_emp')}}" method="post">
                        {{@csrf_field()}}
                        <span class="login100-form-title">
									Registration
								</span>
                        <div class="wrap-input100 validate-input input-group">
                            <a href="javascript:void(0)" class="input-group-text bg-white text-muted">
                                <i class="mdi mdi-account" aria-hidden="true"></i>
                            </a>
                            <input class="input100 border-start-0 ms-0 form-control" type="text" placeholder="Name" name="name">
                        </div>

                        <div class="wrap-input100 validate-input input-group">
                            <a href="javascript:void(0)" class="input-group-text bg-white text-muted">
                                <i class="mdi mdi-account-card-details" aria-hidden="true"></i>
                            </a>
                            <input class="input100 border-start-0 ms-0 form-control" type="text" placeholder="Job Title" name="job_title">
                        </div>

                        <div class="wrap-input100 validate-input input-group">
                            <a href="javascript:void(0)" class="input-group-text bg-white text-muted">
                                <i class="mdi mdi-home" aria-hidden="true"></i>
                            </a>
                            <input class="input100 border-start-0 ms-0 form-control" type="text" placeholder="Address" name="address">
                        </div>

                        <div class="wrap-input100 validate-input input-group">
                            <a href="javascript:void(0)" class="input-group-text bg-white text-muted">
                                <i class="mdi mdi-calendar" aria-hidden="true"></i>
                            </a>
                            <input class="input100 border-start-0 ms-0 form-control" type="number" placeholder="Age" name="age">
                        </div>

                        <div class="wrap-input100 validate-input input-group">
                            <a href="javascript:void(0)" class="input-group-text bg-white text-muted">
                                <i class="mdi mdi-phone" aria-hidden="true"></i>
                            </a>
                            <input class="input100 border-start-0 ms-0 form-control" type="number" placeholder="phone number" name="phone">
                        </div>

                        <div class="wrap-input100 validate-input input-group" data-bs-validate="Valid email is required: ex@abc.xyz">
                            <a href="javascript:void(0)" class="input-group-text bg-white text-muted">
                                <i class="zmdi zmdi-email" aria-hidden="true"></i>
                            </a>
                            <input class="input100 border-start-0 ms-0 form-control" type="email" placeholder="Email" name="email">
                        </div>
                        <div class="container-login100-form-btn">
                            <button type="submit" class="btn w-100 btn-blue font-weight-bold">
                               Register
                            </button>
                        </div>
                    </form>
                </div>
            </div>
            <!-- CONTAINER CLOSED -->
    </div>
    <!-- END PAGE -->

</div>
<!-- BACKGROUND-IMAGE CLOSED -->
<script src="{{asset('js/jquery.min.js')}}"></script>
<script>
    (function ($) {
        "use strict";
        // PAGE LOADING
        $(window).on("load", function (e) {
            $("#global-loader").fadeOut("slow");
        })
    })(jQuery);
</script>
</body>
</html>
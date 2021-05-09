<!DOCTYPE html>
<html lang="en">

<head>

    <title>Reset Password | VR Evento</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="UTF-8">
    <!-- External CSS libraries -->
    <link type="text/css" rel="stylesheet" href="{{asset('/public/homepage/css/bootstrap.min.css')}}">
    <link type="text/css" rel="stylesheet" href="{{asset('/public/homepage/fonts/font-awesome/css/font-awesome.min.css')}}">
    <link type="text/css" rel="stylesheet" href="{{asset('/public/homepage/fonts/flaticon/font/flaticon.css')}}">

    <!-- Favicon icon -->
    <link rel="shortcut icon" href="{{asset('/public/homepage/img/favicon.ico" type="image/x-icon"')}} >

    <!-- Google fonts -->
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800%7CPoppins:400,500,700,800,900%7CRoboto:100,300,400,400i,500,700">

    <!-- Custom Stylesheet -->
    <link type="text/css" rel="stylesheet" href="{{asset('/public/homepage/css/style-login.css')}}">
    <link rel="stylesheet" type="text/css" id="style_sheet" href="{{asset('/public/homepage/css/skins/default.css')}}">


</head>

<body id="top">

<div class="page_loader"></div>

<!-- Login 1 start -->
<div class="login-1">
    <div class="container">
        <div class="row">
            <div class="col-md-4">

            </div>
            <div class="col-md-4">

            </div>
            <div class="col-md-4">
                <div class="login-inner-form" style="border: 3px solid; border-image-source: linear-gradient(45deg, rgb(67,0,146), rgb(201,0,193)); border-image-slice: 1;">
                    <div class="details">
                        <a href="/">
                            <img src="{{asset('/public/homepage/img/logos/logo-2.png')}}" alt="logo">
                        </a>
                        <h3>{{ trans('global.reset_password') }}</h3>
                        <form method="POST" action="{{ route('password.request') }}">
                            @csrf

                            <input name="token" value="{{ $token }}" type="hidden">
                            <div>
                                <div class="form-group">
                                    <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus placeholder="{{ trans('global.login_email') }}">

                                    @if($errors->has('email'))
                                        <span class="text-danger">
                                            {{ $errors->first('email') }}
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required placeholder="{{ trans('global.login_password') }}">

                                    @if($errors->has('password'))
                                        <span class="text-danger">
                                            {{ $errors->first('password') }}
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required placeholder="{{ trans('global.login_password_confirmation') }}">
                                </div>
                            </div>
                            <div class="form-group mb-0">
                                <button type="submit" class="btn-md btn-theme btn-block">{{ trans('global.reset_password') }}</button>
                            </div><br/>
                            <span style="font-size: 12px;">Powered By: <b><a href="http://www.excellenceadvertising.in/" target="_blank">Excellence Advertising</a></b></span>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Login 1 end -->

<!-- External JS libraries -->
<script src="{{ asset('/public/homepage/js/jquery-2.2.0.min.js')}}"></script>
<script src="{{ asset('/public/homepage/js/popper.min.js')}}"></script>
<script src="{{ asset('/public/homepage/js/bootstrap.min.js')}}"></script>
<!-- Custom JS Script -->
</body>

</html>

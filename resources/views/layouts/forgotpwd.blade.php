<!DOCTYPE html>
<html>
<head>
    {{--<meta charset="UTF-8">--}}
    <title>Recuperar senha| Sofia</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- global level css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/chandra_bootstrap.css') }}">
    <link href="{{ asset('assets/vendors/animate/animate.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css"/>
    <link rel="shortcut icon" href="{{ asset('assets/images/favicon.ico') }}" type="image/x-icon">
    <link rel="icon" href="{{ asset('assets/images/favicon.ico') }}" type="image/x-icon">
    <!-- end of global css-->
    <!-- page level styles-->
    <link type="text/css" href="{{ asset('assets/vendors/iCheck/skins/minimal/blue.css') }}">
    <link href="{{ asset('assets/css/frontend/register.css') }}" rel="stylesheet">
    <!-- end of page level styles-->
</head>
<body>
<div class="container">
    <div class="row">

        <div class="box animated fadeInDown">

            <div>
                <img class="login_logo" src="{{ asset('assets/images/logo_grande.png') }}" />
            </div>

            <h4 class="text-center text-primary"><strong>Esqueceu a senha?</strong>
            </h4>

            <p class="text-center">Coloque seu email para a recuperaão de senha.</p>
            @include('notifications')

            <form action="{{ route('forgot-password') }}" class="omb_loginForm" autocomplete="off" method="POST">
                {!! Form::token() !!}
                <input type="email" class="form-control email" name="email" placeholder="Email"
                       value="{!! old('email') !!}">
                <span class="help-block">{{ $errors->first('email', ':message') }}</span>
                <input type="submit" class="btn btn-block btn-primary" value="Recuperar senha"
                       style="margin-top:10px;">
            </form>

            <div class="panel-header">
                <h4 class="text-center text-primary">
                    <a href="{{ route('admin-login') }}">Ou faça Login</a>
                </h4>
            </div>


        </div>
    </div>
</div>
<!-- global js -->
<script type="text/javascript" src="{{ asset('assets/js/frontend/jquery.min.js') }}"></script>
<script src="{{ asset('assets/vendors/wow/js/wow.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/js/jquery-1.11.1.min.js') }}" type="text/javascript"></script>
<script type="text/javascript" src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/vendors/iCheck/js/icheck.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/js/frontend/register.js') }}"></script>
<!-- end of global js -->
</body>
</html>
<!DOCTYPE html>
<html>
<head>
    <title>Login | Mercado ágil</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <!-- global level css -->
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,700'; rel='stylesheet' type='text/css'>
    <link href="{{ asset('assets/css/chandra_bootstrap.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- end of global css-->
    <!-- page level styles-->
    <link href="{{ asset('assets/css/custom_css/login.css') }}" rel="stylesheet" type="text/css">
    <!-- end of page level styles-->
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="panel-body">
                <div class="clearfix">
                    <div class="box animated fadeInDown">
                        {{--<div><img class="login_logo" src="{{ asset('assets/images/logo_grande.png') }}" /></div>--}}
                        <!-- Notifications -->
                        @include('notifications')
                        <form action="{{ route('admin-login') }}" class="omb_loginForm"  autocomplete="off" method="POST">
                            {!! Form::token() !!}
                            <div class="input-group {{ $errors->first('email', 'has-error') }}">
                                <span class="input-group-addon">
                                    <i class="fa fa-user"></i>
                                </span>
                                <input type="email" class="form-control" name="email" placeholder="E-mail" value="{!! old('email') !!}">
                            </div>
                            <span class="help-block">{{ $errors->first('email', ':message') }}</span>

                            <div class="input-group {{ $errors->first('password', 'has-error') }}">
                                <span class="input-group-addon">
                                    <i class="fa fa-lock"></i>
                                </span>
                                <input type="password" class="form-control" name="password" placeholder="Senha">
                            </div>
                            <span class="help-block">{{ $errors->first('password', ':message') }}</span>
                            <div class="checkbox">
                                <label><input type="checkbox"> Lembre-me</label>
                                <a href="{{ URL::to('forgot-password') }}" class="pull-right" style="color: #000">Esqueceu a senha?</a>
                            </div>
                            <input type="submit" class="btn btn-md btn-primary btn-block" value="Entrar" />
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- global js -->
    <script src="{{ asset('assets/js/jquery-1.11.1.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/js/bootstrap.min.js') }}" type="text/javascript"></script>
</body>
</html>

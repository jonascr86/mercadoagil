<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>@yield('title') | Mercado ágil</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->

    <!-- App CSS -->
    {!! Html::style(asset('assets/css/lib.css')) !!}
    <!-- Global vendors CSS -->
    {!! Html::style(asset('assets/vendors/iCheck/css/all.css')) !!}
    {!! Html::style(asset('assets/vendors/jasny-bootstrap/css/jasny-bootstrap.css')) !!}
    {!! Html::style(asset('assets/vendors/select2/css/select2.css')) !!}
    {!! Html::style(asset('assets/vendors/select2/css/select2-bootstrap.css')) !!}
    <!-- Fonts -->
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,700'; rel='stylesheet' type='text/css'>
    <!-- Subpages CSS -->
    @yield('header_styles')
</head>

<body class="skin-chandra">
    <!-- Top navbar -->
    <header class="header">
        <nav class="navbar navbar-static-top" role="navigation">
            <a href="{{ route('dashboard')}}" class="logo">
                {{--<img src="{{ asset('assets/images/logo.png') }}" alt="logo"/>--}}
            </a>
            <div>
                <!--<a href="#" class="navbar-btn sidebar-toggle" data-toggle="offcanvas" role="button"><i class="fa fa-fw fa-hand-o-left"></i></a>-->
            </div>
            <div class="navbar-right">
                <ul class="nav navbar-nav">
                    {{-- User Account --}}
                    @include('layouts._user_menu')
                </ul>
            </div>
        </nav>
    </header>

    <div class="wrapper row-offcanvas row-offcanvas-left">
        <aside class="left-side sidebar-offcanvas">
            <section class="sidebar">
                <div id="menu" role="navigation">
                    <!-- Current user -->
                    @include('layouts._left_bio')
                    <!-- Navigation -->
                    @include('layouts._menu_esquerdo')
                </div>
            </section>
        </aside>

        <aside class="right-side right-padding">
            <!-- Notifications -->
            @include('notifications')
            <!-- Content -->
            <section class="content">
                @yield('content')
            </section>
        </aside>
    </div>

    <!-- App JS -->
    {!! Html::script('assets/js/lib.js') !!}

    <!-- Vendor JS -->
    {!! Html::script('assets/vendors/moment/js/moment.min.js') !!}
    {!! Html::script('assets/vendors/jquery.inputmask/inputmask/inputmask.js') !!}
    {!! Html::script('assets/vendors/jquery.inputmask/inputmask/inputmask.date.extensions.js') !!}
    {!! Html::script('assets/vendors/jquery.inputmask/inputmask/inputmask.extensions.js') !!}
    {!! Html::script('assets/vendors/jquery.inputmask/inputmask/jquery.inputmask.js') !!}
    {!! Html::script('assets/vendors/select2/js/select2.js') !!}
    {!! Html::script('assets/vendors/iCheck/js/icheck.js') !!}

    {!! Html::script('assets/js/main.js') !!}

    <!-- Subpages JS -->
    @yield('footer_scripts')
</body>
</html>

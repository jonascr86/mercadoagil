@extends('site.layout.master')

@section('body')
    <div style="min-height: 1000px">
    <div class="header-area">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="user-menu">
                        <ul>
                            <li><a href="#"><i class="fa fa-user"></i> Cadastre-se</a></li>
                            <li><a href="#"><i class="fa fa-user"></i> Login</a></li>
                        </ul>
                    </div>
                </div>


            </div>
        </div>
    </div> <!-- End header area -->

    <div class="site-branding-area">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <div class="logo">
                        <h1><a href="./"><img src="{{ asset('assets/site/img/logo.png') }}"></a></h1>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- End site branding area -->

    <div class="mainmenu-area">
        <div class="container">
            <div class="row">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                </div>
                <div class="navbar-collapse collapse">
                    <ul class="nav navbar-nav">
                        <li class="active"><a href="{{route('site.home')}}">Selecione o mercado</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div> <!-- End mainmenu area -->



    <div class="promo-area">
        <div class="zigzag-bottom"></div>
        <div class="container">
            <div class="row">
                <a href="{{route('site.itens')}}">
                    <div class="col-md-3 col-sm-6">
                        <div class="single-promo promo2">
                            <i class="fa fa-truck"></i>
                            <p>Mercado da Benjamin - Lajeado</p>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div> <!-- End promo area -->
    </div>
@stop

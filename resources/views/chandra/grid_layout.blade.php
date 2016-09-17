@extends('chandra/default')

{{-- Page title --}}
@section('title')Grid layout @parent

@stop

{{-- Page content --}}
@section('content')
    <section class="content-header">
                    <!--section starts-->
                    <h1>Grid layout</h1>
                    <ol class="breadcrumb">
                        <li>
                            <a href="{{ route('dashboard') }}">
                                <i class="fa fa-fw fa-home"></i>
                                Dashboard
                            </a>
                        </li>
                        <li>
                            <a href="#">UI Features</a>
                        </li>
                        <li>
                            <a href="grid_layout">Grid layout</a>
                        </li>
                    </ol>
                </section>
                <section class="content">
                    <!--main content-->
                    <div class="row">
                        <div class="col-md-12 ">
                            <div class="panel panel-primary">
                                <div class="panel-heading">
                                    <h3 class="panel-title">
                                        <i class="fa fa-fw fa-columns"></i>
                                        Responsive Grid Examples
                                    </h3>
                                    <span class="pull-right">
                                        <i class="fa fa-fw fa-chevron-up clickable"></i>
                                        <i class="fa fa-fw fa-times removepanel clickable"></i>
                                    </span>
                                </div>
                                <div class="panel-body" id="slim1">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <p>
                                                This demostrates Bootstrap Grid system and how it responds to different screen sizes.
                                            </p>
                                            <div class="panel-heading">
                                                <p class="visible-lg">
                                                    lg indicates that the large grid displaying. The grid stacks horizontally &lt; 1200px.
                                                </p>
                                                <p class="visible-md">
                                                    md indicates that the medium grid displaying. The grid stacks horizontally &lt; 992px.
                                                </p>
                                                <p class="visible-sm">
                                                    sm indicates that the small grid displaying. The grid stacks horizontally &lt; 768px.
                                                </p>
                                                <p class="visible-xs">
                                                    xs indicates that the extra small grid displaying. This grid is always horizontal.
                                                </p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-4 col-md-1 col-sm-3 col-xs-4 text-center grid-success">
                                                <span class="visible-lg">.col-lg-4</span>
                                                <span class="visible-md">.col-md-1</span>
                                                <span class="visible-sm">.col-sm-3</span>
                                                <span class="visible-xs">.col-xs-4</span>
                                            </div>
                                            <div class="col-lg-4 col-md-5 col-sm-3 col-xs-4 text-center grid-info">
                                                <span class="visible-lg">.col-lg-4</span>
                                                <span class="visible-md">.col-md-5</span>
                                                <span class="visible-sm">.col-sm-3</span>
                                                <span class="visible-xs">.col-xs-4</span>
                                            </div>
                                            <div class="col-lg-4 col-md-6 col-sm-6 col-xs-4 text-center grid-danger">
                                                <span class="visible-lg">.col-lg-4</span>
                                                <span class="visible-md">.col-md-6</span>
                                                <span class="visible-sm">.col-sm-6</span>
                                                <span class="visible-xs">.col-xs-4</span>
                                            </div>
                                            <div class="row" style="margin-top:50px;">
                                                <h3>xs Grid</h3>
                                                <div class="col-xs-5 text-center grid-success">
                                                    <p>.col-xs-5</p>
                                                </div>
                                                <div class="col-xs-4 text-center grid-info">
                                                    <p>.col-xs-4</p>
                                                </div>
                                                <div class="col-xs-3 text-center grid-danger">
                                                    <p>.col-xs-3</p>
                                                </div>
                                            </div>
                                            <!-- end row -->
                                            <div class="row" style="margin-top:20px;">
                                                <h3>sm Grid</h3>
                                                <div class="col-sm-2 text-center grid-success">
                                                    <p>.col-sm-2</p>
                                                </div>
                                                <div class="col-sm-4 text-center grid-info">
                                                    <p>.col-sm-4</p>
                                                </div>
                                                <div class="col-sm-6 text-center grid-danger">
                                                    <p>.col-sm-6</p>
                                                </div>
                                            </div>
                                            <!-- end row -->
                                            <div class="row" style="margin-top:20px;">
                                                <h3>md Grid</h3>
                                                <div class="col-md-1 text-center grid-success">
                                                    <p>.col-md-1</p>
                                                </div>
                                                <div class="col-md-5 text-center grid-info">
                                                    <p>.col-md-5</p>
                                                </div>
                                                <div class="col-md-6 text-center grid-danger">
                                                    <p>.col-md-6</p>
                                                </div>
                                            </div>
                                            <!-- end row -->
                                            <div class="row" style="margin-top:20px;">
                                                <h3>lg Grid</h3>
                                                <div class="col-lg-4 text-center grid-success">
                                                    <p>.col-lg-4</p>
                                                </div>
                                                <div class="col-lg-4 text-center grid-info">
                                                    <p>.col-lg-4</p>
                                                </div>
                                                <div class="col-lg-4 text-center grid-danger">
                                                    <p>.col-lg-4</p>
                                                </div>
                                            </div>
                                            <!-- end row --> </div>
                                        <!-- end row --> </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <!--main content ends-->
                   </section>
        @stop

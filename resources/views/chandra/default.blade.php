<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>
        @section('title')
            | Sofia
        @show
    </title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>

    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
    <!-- global css -->
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,700'; rel='stylesheet' type='text/css'>
    <link href="{{ asset('assets/css/lib.css') }}" rel="stylesheet" type="text/css"/>
    <!-- end of global css -->
    <!--page level css-->
    @yield('header_styles')
            <!--end of page level css-->
</head>
<body class="skin-chandra">
<!-- header logo: style can be found in header-->
<header class="header">
    <nav class="navbar navbar-static-top" role="navigation">
        <a href="{{ route('dashboard')}}" class="logo">
            <!-- Add the class icon to your logo image or logo icon to add the margining -->
            <img src="{{ asset('assets/img/logo.png') }}" alt="logo"/>
        </a>

        <div>
            <a href="#" class="navbar-btn sidebar-toggle" data-toggle="offcanvas" role="button"><i class="fa fa-fw fa-hand-o-left"></i></a>
        </div>

        <div class="navbar-right">
            <ul class="nav navbar-nav">

                {{-- messages --}}
                @include('layouts._messages')

                {{-- tasks --}}
                @include('layouts._tasks')

                {{-- notifications --}}
                @include('layouts._notifications')

                {{-- User Account --}}
                @include('layouts._user_menu')

            </ul>
        </div>
    </nav>
</header>
<div class="wrapper row-offcanvas row-offcanvas-left">
    <!-- Left side column. contains the logo and sidebar -->
    <aside class="left-side sidebar-offcanvas">
        <!-- sidebar: style can be found in sidebar-->
        <section class="sidebar">
            <div id="menu" role="navigation">

                {{-- user bio --}}
                @include('layouts._left_bio')

                <ul class="navigation">
                    <li {{ (Request::is('chandra//') ? 'class="active"' : '') }}>
                        <a href="{{ route('dashboard') }}">
                            <i class="menu-icon fa fa-fw fa-home"></i>
                            <span class="mm-text ">Dashboard</span>
                        </a>
                    </li>
                    <li class="menu-dropdown {{ (Request::is('chandra/charts') || Request::is('chandra/flot_charts') || Request::is('chandra/nvd3_charts') || Request::is('chandra/chartjs_charts') ? 'active' : '') }}">
                        <a href="#">
                            <i class="menu-icon fa fa-bar-chart-o"></i>
                            <span>Charts</span>
                            <span class="fa arrow"></span>
                        </a>
                        <ul class="sub-menu">
                            <li {{ (Request::is('chandra/flot_charts') ? 'class=active' : '') }}>
                                <a href="{{ URL::to('chandra/flot_charts') }}">
                                    <i class="fa fa-fw fa-area-chart"></i>
                                    Flot Charts
                                </a>
                            </li>
                            <li {{ (Request::is('chandra/nvd3_charts') ? 'class=active' : '') }}>
                                <a href="{{ URL::to('chandra/nvd3_charts') }}">
                                    <i class="fa fa-fw fa-line-chart"></i>
                                    NVD3 Charts
                                </a>
                            </li>
                            <li {{ (Request::is('chandra/chartjs_charts') ? 'class=active' : '') }}>
                                <a href="{{ URL::to('chandra/chartjs_charts') }}">
                                    <i class="menu-icon fa fa-bar-chart-o"></i>
                                    Chart js
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="menu-dropdown {{ (Request::is('chandra/form_elements') || Request::is('chandra/form_builder') ||  Request::is('chandra/form_editors') || Request::is('chandra/form_validations') || Request::is('chandra/form_layouts') || Request::is('chandra/form_wizards') || Request::is('chandra/x-editable') ? 'active' : '') }}">
                        <a href="#">
                            <i class="menu-icon fa fa-check-square"></i>
                            <span>Forms</span>
                            <span class="fa arrow"></span>
                        </a>
                        <ul class="sub-menu">
                            <li {{ (Request::is('chandra/form_elements') ? 'class=active' : '') }}>
                                <a href="{{ URL::to('chandra/form_elements') }}">
                                    <i class="fa fa-fw fa-fire"></i>
                                    Form Elements
                                </a>
                            </li>
                            <li {{ (Request::is('chandra/form_builder') ? 'class=active' : '') }}>
                                <a href="{{ URL::to('chandra/form_builder') }}">
                                    <i class="fa fa-fw fa-image"></i>
                                    Form Builder
                                </a>
                            </li>

                            <li {{ (Request::is('chandra/form_editors') ? 'class=active' : '') }}>
                                <a href="{{ URL::to('chandra/form_editors') }}">
                                    <i class="fa fa-fw fa-file-text-o"></i>
                                    Form Editors
                                </a>
                            </li>
                            <li {{ (Request::is('chandra/form_validations') ? 'class=active' : '') }}>
                                <a href="{{ URL::to('chandra/form_validations') }}">
                                    <i class="fa fa-fw fa-warning"></i>
                                    Form Validations
                                </a>
                            </li>
                            <li {{ (Request::is('chandra/form_layouts') ? 'class=active' : '') }}>
                                <a href="{{ URL::to('chandra/form_layouts') }}">
                                    <i class="fa fa-fw fa-fire"></i>
                                    Form Layouts
                                </a>
                            </li>
                            <li {{ (Request::is('chandra/form_wizards') ? 'class=active' : '') }}>
                                <a href="{{ URL::to('chandra/form_wizards') }}">
                                    <i class="fa fa-fw fa-cog"></i>
                                    Form Wizards
                                </a>
                            </li>
                            <li {{ (Request::is('chandra/x-editable') ? 'class=active' : '') }}>
                                <a href="{{ URL::to('chandra/x-editable') }}">
                                    <i class="fa fa-fw fa-eyedropper"></i>
                                    X-editable
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li class="menu-dropdown {{ (Request::is('chandra/general_components') || Request::is('chandra/pickers') || Request::is('chandra/buttons') || Request::is('chandra/panels') || Request::is('chandra/tabs_accordions') || Request::is('chandra/font_icons') || Request::is('chandra/grid_layout') || Request::is('chandra/tags_input') || Request::is('chandra/nestable_list') || Request::is('chandra/toastr_notifications') || Request::is('chandra/session_timeout') || Request::is('chandra/draggable_portlets') || Request::is('chandra/draggable_portlets2') ? 'active' : '') }}">
                        <a href="#">
                            <i class="menu-icon fa fa-desktop"></i>
                                <span>
                                    UI Features
                                </span>
                            <span class="fa arrow"></span>
                        </a>
                        <ul class="sub-menu">
                            <li {{ (Request::is('chandra/general_components') ? 'class=active' : '') }}>
                                <a href="{{ URL::to('chandra/general_components') }}">
                                    <i class="fa fa-fw fa-plug"></i>
                                    General Components
                                </a>
                            </li>
                            <li {{ (Request::is('chandra/pickers') ? 'class=active' : '') }}>
                                <a href="{{ URL::to('chandra/pickers') }}">
                                    <i class="fa fa-fw fa-paint-brush"></i>
                                    Pickers
                                </a>
                            </li>
                            <li {{ (Request::is('chandra/buttons') ? 'class=active' : '') }}>
                                <a href="{{ URL::to('chandra/buttons') }}">
                                    <i class="fa fa-fw fa-delicious"></i>
                                    Buttons
                                </a>
                            </li>
                            <li {{ (Request::is('chandra/panels') ? 'class=active' : '') }}>
                                <a href="{{ URL::to('chandra/panels') }}">
                                    <i class="fa fa-fw fa-gift"></i>
                                    Panels
                                </a>
                            </li>
                            <li {{ (Request::is('chandra/tabs_accordions') ? 'class=active' : '') }}>
                                <a href="{{ URL::to('chandra/tabs_accordions') }}">
                                    <i class="fa fa-fw fa-copy"></i>
                                    Tabs &amp; Accordions
                                </a>
                            </li>
                            <li {{ (Request::is('chandra/font_icons') ? 'class=active' : '') }}>
                                <a href="{{ URL::to('chandra/font_icons') }}">
                                    <i class="fa fa-fw fa-font"></i>
                                    Font Icons
                                </a>
                            </li>
                            <li {{ (Request::is('chandra/grid_layout') ? 'class=active' : '') }}>
                                <a href="{{ URL::to('chandra/grid_layout') }}">
                                    <i class="fa fa-fw fa-columns"></i>
                                    Grid Layout
                                </a>
                            </li>
                            <li {{ (Request::is('chandra/tags_input') ? 'class=active' : '') }}>
                                <a href="{{ URL::to('chandra/tags_input') }}">
                                    <i class="fa fa-fw fa-tag"></i>
                                    Tags Input
                                </a>
                            </li>
                            <li {{ (Request::is('chandra/nestable_list') ? 'class=active' : '') }}>
                                <a href="{{ URL::to('chandra/nestable_list') }}">
                                    <i class="fa fa-fw fa-navicon"></i>
                                    Nestable List
                                </a>
                            </li>
                            <li {{ (Request::is('chandra/toastr_notifications') ? 'class=active' : '') }}>
                                <a href="{{ URL::to('chandra/toastr_notifications') }}">
                                    <i class="fa fa-fw fa-desktop"></i>
                                    Toastr Notifications
                                </a>
                            </li>
                            <li {{ (Request::is('chandra/session_timeout') ? 'class=active' : '') }}>
                                <a href="{{ URL::to('chandra/session_timeout') }}">
                                    <i class="fa fa-fw fa-rocket"></i>
                                    Session Timeout
                                </a>
                            </li>
                            <li {{ (Request::is('chandra/draggable_portlets') ? 'class=active' : '') }}>
                                <a href="{{ URL::to('chandra/draggable_portlets') }}">
                                    <i class="fa fa-fw fa-random"></i>
                                    Draggable Portlets
                                </a>
                            </li>
                            <li {{ (Request::is('chandra/draggable_portlets2') ? 'class=active' : '') }}>
                                <a href="{{ URL::to('chandra/draggable_portlets2') }}">
                                    <i class="fa fa-fw fa-anchor"></i>
                                    Draggable Portlets2
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="menu-dropdown {{ (Request::is('chandra/timeline') || Request::is('chandra/transitions') || Request::is('chandra/circle_sliders') ? 'active' : '') }}">
                        <a href="#">
                            <i class="menu-icon fa fa-briefcase"></i>
                                <span>
                                    UI Components
                                </span>
                            <span class="fa arrow"></span>
                        </a>
                        <ul class="sub-menu">

                            <li {{ (Request::is('chandra/timeline') ? 'class=active' : '') }}>
                                <a href="{{ URL::to('chandra/timeline') }}">
                                    <i class="fa fa-fw fa-clock-o"></i>
                                    Timeline
                                </a>
                            </li>
                            <li {{ (Request::is('chandra/transitions') ? 'class=active' : '') }}>
                                <a href="{{ URL::to('chandra/transitions') }}">
                                    <i class="fa fa-fw fa-star-half-empty"></i>
                                    Transitions
                                </a>
                            </li>
                            <li {{ (Request::is('chandra/circle_sliders') ? 'class=active' : '') }}>
                                <a href="{{ URL::to('chandra/circle_sliders') }}">
                                    <i class="fa fa-fw fa-sun-o"></i>
                                    Circle Sliders
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="menu-dropdown  {{ (Request::is('chandra/create_table') || Request::is('chandra/simple_tables') || Request::is('chandra/datatables') || Request::is('chandra/advanced_datatables') ? 'active' : '') }}">
                        <a href="#">
                            <i class="menu-icon fa fa-table"></i>
                            <span>DataTables</span>
                            <span class="fa arrow"></span>
                        </a>
                        <ul class="sub-menu">
                            <li {{ (Request::is('chandra/create_table') ? 'class=active' : '') }}>
                                <a href="{{ URL::to('chandra/create_table') }}">
                                    <i class="fa fa-fw fa-dedent"></i>
                                    Create tables
                                </a>
                            </li>

                            <li {{ (Request::is('chandra/simple_tables') ? 'class=active' : '') }}>
                                <a href="{{ URL::to('chandra/simple_tables') }}">
                                    <i class="fa fa-fw fa-tasks"></i>
                                    Simple tables
                                </a>
                            </li>
                            <li {{ (Request::is('chandra/datatables') ? 'class=active' : '') }}>
                                <a href="{{ URL::to('chandra/datatables') }}">
                                    <i class="fa fa-fw fa-database"></i>
                                    Data Tables
                                </a>
                            </li>
                            <li {{ (Request::is('chandra/advanced_datatables') ? 'class=active' : '') }}>
                                <a href="{{ URL::to('chandra/advanced_datatables') }}">
                                    <i class="fa fa-fw fa-table"></i>
                                    Advanced Tables
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li class="menu-dropdown {{ (Request::is('chandra/bootstrap_simple_table') || Request::is('chandra/bootstrap_advance_table') || Request::is('chandra/bootstrap_edit_table') ? 'active' : '') }}">
                        <a href="#">
                            <i class="menu-icon fa fa-table"></i>
                            <span>Bootstrap Tables</span>
                            <span class="fa arrow"></span>
                        </a>
                        <ul class="sub-menu">
                            <li {{ (Request::is('chandra/bootstrap_simple_table') ? 'class=active' : '') }}>
                                <a href="{{ URL::to('chandra/bootstrap_simple_table') }}">
                                    <i class="fa fa-fw fa-align-justify"></i>
                                    Basic tables
                                </a>
                            </li>

                            <li {{ (Request::is('chandra/bootstrap_advance_table') ? 'class=active' : '') }}>
                                <a href="{{ URL::to('chandra/bootstrap_advance_table') }}">
                                    <i class="fa fa-fw fa-tasks"></i>
                                    Advanced tables
                                </a>
                            </li>
                            <li {{ (Request::is('chandra/bootstrap_edit_table') ? 'class=active' : '') }}>
                                <a href="{{ URL::to('chandra/bootstrap_edit_table') }}">
                                    <i class="fa fa-fw fa-database"></i>
                                    Editable Tables
                                </a>
                            </li>

                        </ul>
                    </li>

                    <li {{ (Request::is('chandra/calendar') ? 'class=active' : '') }}>
                        <a href="{{ URL::to('chandra/calendar') }}">
                            <i class=" menu-icon fa fa-fw fa-calendar"></i>
                            <span>Calendar</span>
                            <small class="badge">4</small>
                        </a>
                    </li>
                    <li class="menu-dropdown {{ (Request::is('chandra/mail_box') || Request::is('chandra/compose') || Request::is('chandra/view_mail') ? 'active' : '') }}">
                        <a href="#">
                            <i class="fa fa-fw fa-envelope"></i>
                            <span>Email</span>
                            <span class="fa arrow"></span>
                        </a>
                        <ul class="sub-menu">
                            <li {{ (Request::is('chandra/mail_box') ? 'class=active' : '') }}>
                                <a href="{{ URL::to('chandra/mail_box') }}">
                                    <i class="fa fa-inbox"></i>
                                    Mail box
                                </a>
                            </li>
                            <li {{ (Request::is('chandra/compose') ? 'class=active' : '') }}>
                                <a href="{{ URL::to('chandra/compose') }}">
                                    <i class="fa fa-pencil"></i>
                                    Compose Message
                                </a>
                            </li>
                            <li {{ (Request::is('chandra/view_mail') ? 'class=active' : '') }}>
                                <a href="{{ URL::to('chandra/view_mail') }}">
                                    <i class="fa fa-eye"></i>
                                    Single Mail
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li {{ (Request::is('chandra/task') ? 'class=active' : '') }}>
                        <a href="{{ URL::to('chandra/task') }}">
                            <i class="fa fa-fw fa-list-ul"></i>
                            <span>Tasks</span>
                            <small class="badge">10</small>
                        </a>
                    </li>
                    <li class="menu-dropdown {{ (Request::is('chandra/gallery') || Request::is('chandra/masonry_gallery') || Request::is('chandra/multiplefile_upload') || Request::is('chandra/dropzone') || Request::is('chandra/image_magnifier') || Request::is('chandra/image_cropping') ? 'active' : '') }}">
                        <a href="#">
                            <i class="menu-icon fa fa-fw fa-photo"></i>
                            <span>Gallery</span>
                            <span class="fa arrow"></span>
                        </a>
                        <ul class="sub-menu">
                            <li {{ (Request::is('chandra/gallery') ? 'class=active' : '') }}>
                                <a href="{{ URL::to('chandra/gallery') }}">
                                    <i class="fa fa-fw fa-file-image-o"></i>
                                    Gallery
                                </a>
                            </li>
                            <li {{ (Request::is('chandra/masonry_gallery') ? 'class=active' : '') }}>
                                <a href="{{ URL::to('chandra/masonry_gallery') }}">
                                    <i class="fa fa-fw fa-file-image-o"></i>
                                    Masonry Gallery
                                </a>
                            </li>
                            <li {{ (Request::is('chandra/multiplefile_upload') ? 'class=active' : '') }}>
                                <a href="{{ URL::to('chandra/multiplefile_upload') }}">
                                    <i class="fa fa-fw fa-cloud-upload"></i>
                                    Multiple File Upload
                                </a>
                            </li>
                            <li {{ (Request::is('chandra/dropzone') ? 'class=active' : '') }}>
                                <a href="{{ URL::to('chandra/dropzone') }}">
                                    <i class="fa fa-fw fa-cloud-upload"></i>
                                    Dropzone
                                </a>
                            </li>

                            <li {{ (Request::is('chandra/image_magnifier') ? 'class=active' : '') }}>
                                <a href="{{ URL::to('chandra/image_magnifier') }}">
                                    <i class="fa fa-fw fa-search"></i>
                                    Image Magnifier
                                </a>
                            </li>
                            <li {{ (Request::is('chandra/image_cropping') ? 'class=active' : '') }}>
                                <a href="{{ URL::to('chandra/image_cropping') }}">
                                    <i class="fa fa-fw fa-image"></i>
                                    Image Cropper
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="menu-dropdown {{ (Request::is('chandra/google_maps') || Request::is('chandra/vector_maps')? 'active' : '') }}">
                        <a href="#">
                            <i class="menu-icon fa fa-map-marker"></i>
                            <span>Maps</span>
                            <span class="fa arrow"></span>
                        </a>
                        <ul class="sub-menu">
                            <li {{ (Request::is('chandra/google_maps') ? 'class=active' : '') }}>
                                <a href="{{ URL::to('chandra/google_maps') }}">
                                    <i class="fa fa-fw fa-globe"></i>
                                    Google Maps
                                </a>
                            </li>
                            <li {{ (Request::is('chandra/vector_maps') ? 'class=active' : '') }}>
                                <a href="{{ URL::to('chandra/vector_maps') }}">
                                    <i class="fa fa-fw fa-map-marker"></i>
                                    Vector Maps
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="menu-dropdown {{ (Request::is('chandra/faq') || Request::is('chandra/invoice') || Request::is('chandra/blank') ? 'active' : '') }}">
                        <a href="#">
                            <i class="menu-icon fa fa-files-o"></i>
                            <span>Pages</span>
                            <span class="fa arrow"></span>
                        </a>
                        <ul class="sub-menu">
                            <li {{ (Request::is('chandra/faq') ? 'class=active' : '') }}>
                                <a href="{{ URL::to('chandra/faq') }}">
                                    <i class="fa fa-fw fa-question"></i>
                                    FAQ
                                </a>
                            </li>
                            <li>
                                <a href="{{ URL::to('chandra/lockscreen') }}">
                                    <i class="fa fa-fw fa-lock"></i>
                                    Lockscreen
                                </a>
                            </li>
                            <li>
                                <a href="{{ URL::to('chandra/invoice') }}">
                                    <i class="fa fa-fw fa-newspaper-o"></i>
                                    Invoice
                                </a>
                            </li>
                            <li {{ (Request::is('chandra/blank') ? 'class=active' : '') }}>
                                <a href="{{ URL::to('chandra/blank') }}">
                                    <i class="fa fa-fw fa-file-o"></i>
                                    Blank
                                </a>
                            </li>
                            <li>
                                <a href="{{ URL::to('chandra/login') }}">
                                    <i class="fa fa-fw fa-sign-in"></i>
                                    Login
                                </a>
                            </li>
                            <li>
                                <a href="{{ URL::to('chandra/register') }}">
                                    <i class="fa fa-fw fa-sign-in"></i>
                                    Register
                                </a>
                            </li>
                            <li>
                                <a href="{{ URL::to('chandra/404') }}">
                                    <i class="fa fa-fw fa-unlink"></i>
                                    404 Error
                                </a>
                            </li>
                            <li>
                                <a href="{{ URL::to('chandra/500') }}">
                                    <i class="fa fa-fw fa-frown-o"></i>
                                    500 Error
                                </a>
                            </li>
                        </ul>
                    </li>

                    {{-- Menus generated by CRUD generator --}}
                    @include('layouts/menu')

                    <li class="menu-dropdown {{ (Request::is('chandra/boxed') || Request::is('chandra/layout_fixed_header') || Request::is('chandra/layout_boxed_fixed_header') || Request::is('chandra/layout_fixed') ? 'active' : '') }}">
                        <a href="#">
                            <i class="menu-icon fa fa-th"></i>
                            <span>Layouts</span>
                            <span class="fa arrow"></span>
                        </a>
                        <ul class="sub-menu">
                            <li {{ (Request::is('chandra/boxed') ? 'class=active' : '') }}>
                                <a href="{{ URL::to('chandra/boxed') }}">
                                    <i class="fa fa-fw fa-th-large"></i>
                                    Boxed Layout
                                </a>
                            </li>
                            <li {{ (Request::is('chandra/layout_fixed_header') ? 'class=active' : '') }}>
                                <a href="{{ URL::to('chandra/layout_fixed_header') }}">
                                    <i class="fa fa-fw fa-th-list"></i>
                                    Fixed Header
                                </a>
                            </li>
                            <li {{ (Request::is('chandra/layout_boxed_fixed_header') ? 'class=active' : '') }}>
                                <a href="{{ URL::to('chandra/layout_boxed_fixed_header') }}">
                                    <i class="fa fa-fw fa-th"></i>
                                    Boxed &amp; Fixed Header
                                </a>
                            </li>
                            <li {{ (Request::is('chandra/layout_fixed') ? 'class=active' : '') }}>
                                <a href="{{ URL::to('chandra/layout_fixed') }}">
                                    <i class="fa fa-fw fa-indent"></i>
                                    Fixed Header &amp; Menu
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="menu-dropdown">
                        <a href="#">
                            <i class="menu-icon fa fa-sitemap"></i>
                                <span>
                                    Menu levels
                                </span>
                            <span class="fa arrow"></span>
                        </a>
                        <ul class="sub-menu">
                            <li>
                                <a href="#">
                                    <i class="fa fa-fw fa-sitemap"></i>
                                    Level 1
                                    <span class="fa arrow"></span>
                                </a>
                                <ul class="sub-menu sub-submenu">
                                    <li>
                                        <a href="#">
                                            <i class="fa fa-fw fa-sitemap"></i>
                                            Level 2
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="fa fa-fw fa-sitemap"></i>
                                            Level 2
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="fa fa-fw fa-sitemap"></i>
                                            Level 2
                                            <span class="fa arrow"></span>
                                        </a>
                                        <ul class="sub-menu sub-submenu">
                                            <li>
                                                <a href="#">
                                                    <i class="fa fa-fw fa-sitemap"></i>
                                                    Level 3
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#">
                                                    <i class="fa fa-fw fa-sitemap"></i>
                                                    Level 3
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#">
                                                    <i class="fa fa-fw fa-sitemap"></i>
                                                    Level 3
                                                    <span class="fa arrow"></span>
                                                </a>
                                                <ul class="sub-menu sub-submenu">
                                                    <li>
                                                        <a href="#">
                                                            <i class="fa fa-fw fa-sitemap"></i>
                                                            Level 4
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="#">
                                                            <i class="fa fa-fw fa-sitemap"></i>
                                                            Level 4
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="#">
                                                            <i class="fa fa-fw fa-sitemap"></i>
                                                            Level 4
                                                            <span class="fa arrow"></span>
                                                        </a>
                                                        <ul class="sub-menu sub-submenu">
                                                            <li>
                                                                <a href="#">
                                                                    <i class="fa fa-fw fa-sitemap"></i>
                                                                    Level 5
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a href="#">
                                                                    <i class="fa fa-fw fa-sitemap"></i>
                                                                    Level 5
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a href="#">
                                                                    <i class="fa fa-fw fa-sitemap"></i>
                                                                    Level 5
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </li>
                                                </ul>
                                            </li>
                                            <li>
                                                <a href="#">
                                                    <i class="fa fa-fw fa-sitemap"></i>
                                                    Level 4
                                                </a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="fa fa-fw fa-sitemap"></i>
                                            Level 2
                                            <span class="fa arrow"></span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="fa fa-fw fa-sitemap"></i>
                                    Level 1
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="fa fa-fw fa-sitemap"></i>
                                    Level 1
                                    <span class="fa arrow"></span>
                                </a>
                                <ul class="sub-menu sub-submenu">
                                    <li>
                                        <a href="#">
                                            <i class="fa fa-fw fa-sitemap"></i>
                                            Level 2
                                            <span class="fa arrow"></span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="fa fa-fw fa-sitemap"></i>
                                            Level 2
                                            <span class="fa arrow"></span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="fa fa-fw fa-sitemap"></i>
                                            Level 2
                                            <span class="fa arrow"></span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                </ul>
                <!-- / .navigation -->
            </div>
            <!-- menu -->
        </section>
        <!-- /.sidebar -->
    </aside>
    <aside class="right-side right-padding">

        <!-- Notifications -->
        @include('notifications')

        <!-- Content -->
        @yield('content')
        <!-- /.content -->
    </aside>
    <!-- /.right-side -->
</div>
<!-- /.right-side -->
<!-- ./wrapper -->
<!-- global js -->
<script src="{{ asset('assets/js/lib.js') }}" type="text/javascript"></script>
<script src="{{asset('assets/js/custom_js/style-switcher.js')}}" type="text/javascript"></script>

<!-- begin page level js -->
@yield('footer_scripts')
<!-- end page level js -->
</body>
</html>

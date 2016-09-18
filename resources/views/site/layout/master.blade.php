
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Mercado Agil</title>

        <!-- Google Fonts -->
        <link href='http://fonts.googleapis.com/css?family=Titillium+Web:400,200,300,700,600' rel='stylesheet' type='text/css'>
        <link href='http://fonts.googleapis.com/css?family=Roboto+Condensed:400,700,300' rel='stylesheet' type='text/css'>
        <link href='http://fonts.googleapis.com/css?family=Raleway:400,100' rel='stylesheet' type='text/css'>

        <!-- Bootstrap -->
        <link href="{{ asset('assets/site/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />

        <!-- Font Awesome -->
        <link href="{{ asset('assets/site/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css" />

        <!-- Custom CSS -->
        <link href="{{ asset('assets/site/css/owl.carousel.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('assets/site/style.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('assets/site/css/responsive.css') }}" rel="stylesheet" type="text/css" />


        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body>

        <div style="min-height: 1000px">
            @yield('body')
        </div>


        <div class="footer-bottom-area">
            <div class="container">
                <div class="row">
                    <div class="col-md-8">
                        <div class="copyright">
                            <p>&copy; 2015 uCommerce. All Rights Reserved. <a href="http://www.freshdesignweb.com" target="_blank">freshDesignweb.com</a></p>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="footer-card-icon">
                            <i class="fa fa-cc-discover"></i>
                            <i class="fa fa-cc-mastercard"></i>
                            <i class="fa fa-cc-paypal"></i>
                            <i class="fa fa-cc-visa"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- End footer bottom area -->

        <!-- Latest jQuery form server -->
        <script src="https://code.jquery.com/jquery.min.js"></script>

        <!-- Bootstrap JS form CDN -->
        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>

        <!-- jQuery sticky menu -->
        <script href="{{ asset('assets/site/js/owl.carousel.min.js') }}"></script>
        <script href="{{ asset('assets/site/js/jquery.sticky.js') }}"></script>


        <!-- jQuery easing -->
        <script href="{{ asset('assets/site/js/jquery.easing.1.3.min.js') }}"></script>

        <!-- Main Script -->
        <script href="{{ asset('assets/site/js/main.js') }}"></script>


        <!-- Slider -->
        <script href="{{ asset('assets/site/js/bxslider.min.js') }}"></script>

        <script href="{{ asset('assets/site/js/script.slider.js') }}"></script>
    </body>
</html>
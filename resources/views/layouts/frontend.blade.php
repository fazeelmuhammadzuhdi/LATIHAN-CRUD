<!DOCTYPE html>
<html lang="en">

<head>
    <title>WebUni - Education Template</title>
    <meta charset="UTF-8">
    <meta name="description" content="WebUni Education Template">
    <meta name="keywords" content="webuni, education, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Favicon -->
    <link href="{{ asset('/frontend') }}/img/favicon.ico" rel="shortcut icon" />

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:400,400i,500,500i,600,600i,700,700i,800,800i"
        rel="stylesheet">

    <!-- Stylesheets -->
    <link rel="stylesheet" href="{{ asset('/frontend') }}/css/bootstrap.min.css" />
    <link rel="stylesheet" href="{{ asset('/frontend') }}/css/font-awesome.min.css" />
    <link rel="stylesheet" href="{{ asset('/frontend') }}/css/owl.carousel.css" />
    <link rel="stylesheet" href="{{ asset('/frontend') }}/css/style.css" />


    <!--[if lt IE 9]>
 <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
 <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
 <![endif]-->

</head>

<body>
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>

    <!-- Header section -->

    <!-- Header section end -->
    <header class="header-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-3">
                    <div class="site-logo">
                        <img src="{{ asset('/frontend') }}/img/logo.png" alt="">
                    </div>
                    <div class="nav-switch">
                        <i class="fa fa-bars"></i>
                    </div>
                </div>
                <div class="col-lg-9 col-md-9">
                    <a href="/register" class="site-btn header-btn">Registrasi</a>
                    <nav class="main-menu">
                        <ul>
                            <li><a href="/">Home</a></li>
                            <li><a href="/register">Daftar</a></li>

                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </header>

    <!-- Hero section -->
    @yield('content')
    <!-- banner section end -->


    <!-- footer section -->

    <!-- footer section end -->


    <!--====== Javascripts & Jquery ======-->
    <script src="{{ asset('/frontend') }}/js/jquery-3.2.1.min.js"></script>
    <script src="{{ asset('/frontend') }}/js/bootstrap.min.js"></script>
    <script src="{{ asset('/frontend') }}/js/mixitup.min.js"></script>
    <script src="{{ asset('/frontend') }}/js/circle-progress.min.js"></script>
    <script src="{{ asset('/frontend') }}/js/owl.carousel.min.js"></script>
    <script src="{{ asset('/frontend') }}/js/main.js"></script>

</html>

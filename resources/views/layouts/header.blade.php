
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="format-detection" content="telephone=no"/>
    <script type="text/javascript">
        //<![CDATA[
        try{if (!window.CloudFlare) {var CloudFlare=[{verbose:0,p:0,byc:0,owlid:"cf",bag2:1,mirage2:0,oracle:0,paths:{cloudflare:"/cdn-cgi/nexp/dok3v=1613a3a185/"},atok:"b6a0fd84e979fe2e83b72d543701f967",petok:"d0230fdbc04bf66200995b4cb041a949b4945ef8-1494684203-1800",zone:"template-help.com",rocket:"0",apps:{"abetterbrowser":{"ie":"7"}}}];!function(a,b){a=document.createElement("script"),b=document.getElementsByTagName("script")[0],a.async=!0,a.src="//ajax.cloudflare.com/cdn-cgi/nexp/dok3v=85b614c0f6/cloudflare.min.js",b.parentNode.insertBefore(a,b)}()}}catch(e){};
        //]]>
    </script>
    <link rel="icon" href="images/favicon.ico" type="image/x-icon">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Сбор пожертвований на проект храма Львов') }}</title>


    <!-- Bootstrap -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet">
    <!-- Links -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/search.css') }}">
    <link rel="stylesheet" href="{{ asset('css/camera.css') }}">
    <link rel="stylesheet" href="{{ asset('css/owl-carousel.css') }}">
    <link rel="stylesheet" href="{{ asset('css/jquery.fancybox.css') }}">

    <!--JS-->
    <script src="{{ asset('js/jquery.js') }}"></script>
    <script src="{{ asset('js/jquery-migrate-1.2.1.min.js') }}"></script>
    <script src="{{ asset('js/progressbar.js') }}"></script>
    {{--<script src="//static.liqpay.com/libjs/checkout.js"></script>--}}
    <script src="{{ asset('js/common.js') }}"></script>



    <!--[if lt IE 9]>
    <div style=' clear: both; text-align:center; position: relative;'>
        <a href="https://windows.microsoft.com/en-US/internet-explorer/..">
            <img src="images/ie8-panel/warning_bar_0000_us.jpg" border="0" height="42" width="820"
                 alt="You are using an outdated browser. For a faster, safer browsing experience, upgrade for free today."/>
        </a>
    </div>
    <script src="{{ asset('js/html5shiv.js') }}"></script>
    <![endif]-->
    <script src='{{ asset('js/device.min.js') }}'></script>

    <!-- Scripts -->
    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>
</head>

<body>
<div class="page">
    <!--========================================================
                              HEADER
    =========================================================-->
    <header class="clearfix @if (Request::route()->uri() != '/') bg_header @endif">
        <div id="stuck_container" class="stuck_container">
            <nav class="navbar">
                <div class="navbar-brand">
                    <a href="./">
                        <h1 class="brand_name">
                            Hindu temple
                        </h1>
                    </a>
                </div>
                <ul class="nav sf-menu" data-type="navbar">
                    <li class="active">
                        <a href="./">Home</a>
                    </li>
                    <li>
                        <a class="dropdown" href="index-1.html"> About Temple</a>
                        <ul>
                            <li>
                                <a href="#">Quisque nulla </a>
                            </li>
                            <li>
                                <a href="#">Vestibulum libero nis </a>
                            </li>
                            <li class="act">
                                <a href="#">Porta vel scelerisque eget</a>
                                <ul>
                                    <li>
                                        <a href="#">Latest</a>
                                    </li>
                                    <li>
                                        <a href="#">Archive</a>
                                    </li>
                                    <li>
                                        <a href="#">Et dolore</a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="#">Malesuada at neque </a>
                            </li>
                            <li>
                                <a href="#">Vivamus eget nibh </a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="index-2.html"> Gallery</a>
                    </li>
                    <li>
                        <a href="index-3.html"> News &#38; Media</a>
                    </li>

                    <li>
                        <a href="index-4.html">Contacts</a>
                    </li>
                </ul>

            </nav>
            <div class="srch"><a class="search-form_toggle" href="#"></a>

                <form class="search-form" action="search.php" method="GET" accept-charset="utf-8">
                    <label class="search-form_label">
                        <input class="search-form_input" type="text" name="s" autocomplete="off"
                               placeholder="Search.."/>
                        <span class="search-form_liveout"></span>
                    </label>
                    <button class="search-form_submit fa-search" type="submit"></button>
                </form>
            </div>
            {{--<!-- Right Side Of Navbar// auth/log -->
            <ul class="nav navbar-nav navbar-right">
                <!-- Authentication Links -->
                @if (Auth::guest())
                    <li><a href="{{ route('login') }}">Login</a></li>
                    <li><a href="{{ route('register') }}">Register</a></li>
                @else
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <ul class="dropdown-menu" role="menu">
                            <li>
                                <a href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    Logout
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </li>
                        </ul>
                    </li>
                @endif
            </ul>--}}
        </div>

        @if (Request::route()->uri() == '/')
        <section>
            <div class="container">
                <div class="position-abs">
                    <div class="cnt">
                        <h1 class="fw-xb">Serving the needs of the <br/> Hindu Community </h1>
                    </div>

                    <div class="block-contact wow fadeInRight" data-wow-duration="2s">

                        <dl>
                            <dt class="fw-xb">Temple Hours:</dt>
                            <dd><span class="fw-b">Monday - Friday:</span> 9:30am - 12:30pm | 5:30pm - 8:30pm</dd>
                            <dd><span class="fw-b">Saturday - Sunday:</span> 9:00am - 8:30pm</dd>
                        </dl>

                        <dl>
                            <dt class="fw-xb">Daily Aarti:</dt>
                            <dd>12:00pm and 7:30pm</dd>
                        </dl>
                    </div>
                </div>

            </div>
        </section>

        <div class="camera_container">
            <div id="camera" class="camera_wrap">
                <div data-src="{{ url('images/slide1.jpg') }}"></div>
                <div data-src="{{ url('images/slide2.jpg') }}"></div>
            </div>
        </div>
        @endif

    </header>
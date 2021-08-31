<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>{{config('app.name')}}</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
        <meta name="description" content="Elephant is a front-end template created to help you build modern web applications, fast and in a professional manner.">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        
        <meta name="user" content="{{ Auth::user() }}">
        <!-- Facebook meta tags -->
        <meta property="og:url" content="http://demo.naksoid.com/elephant">
        <meta property="og:type" content="website">
        <meta property="og:title" content="The fastest way to build modern admin site for any platform, browser, or device">
        <meta property="og:description" content="Elephant is a front-end template created to help you build modern web applications, fast and in a professional manner.">
        <meta property="og:image" content="http://demo.naksoid.com/elephant/img/ae165ef33d137d3f18b7707466aa774d.jpg">

        <!-- Twitter meta tags -->
        <meta name="twitter:card" content="summary_large_image">
        <meta name="twitter:site" content="@naksoid">
        <meta name="twitter:creator" content="@naksoid">
        <meta name="twitter:title" content="The fastest way to build modern admin site for any platform, browser, or device">
        <meta name="twitter:description" content="Elephant is a front-end template created to help you build modern web applications, fast and in a professional manner.">
        <meta name="twitter:image" content="http://demo.naksoid.com/elephant/img/ae165ef33d137d3f18b7707466aa774d.jpg">

        <!-- Favicons -->
        <link rel="shortcut icon" href="/images/logos/favicon.ico">
        <meta name="theme-color" content="#ffffff">

        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,400italic,500,700">

        <link rel="stylesheet" href="/css/app/vendor.min.css">
        <link rel="stylesheet" href="/css/app/elephant.min.css">
        <link rel="stylesheet" href="/css/app/application.min.css">
        <link href="{{ asset('/css/app/my-style.css') }}" rel="stylesheet" type="text/css" >
        <link href="{{ asset('/css/app/shopping-cart.min.css') }}" rel="stylesheet" type="text/css" >
        <link href="{{ asset('/css/app/product.min.css') }}" rel="stylesheet" type="text/css" >
        
    </head>
    <body class="layout layout-header-fixed layout-sidebar-fixed">
        <div id="app">
            <div class="layout-header" style="box-shadow: rgba(255, 255, 255, 0.09) 0px 1px 0px inset, rgba(0, 0, 0, 0.075) 0px 1px 5px;">
                @include('app.nav.header')
            </div>
            <div class="layout-main" >
                <div class="layout-sidebar">
                    @include('app.nav.main')
                </div>
            
                <div class="layout-content">
                    <div class="layout-content-body" >
                        @yield('layout-content')
                    </div>
                </div>
                
                <div class="layout-footer my-footer-margin-left">
                    @yield('layout-footer')
                </div>
            </div>
            <customereditmodal />
        </div>
        <script src="/js/vendor.js"></script>
        <script src="/js/elephant.min.js"></script>
        <script src="/js/app.js"></script>
        <script src="/js/application.min.js"></script>
        @yield('scripts')

    </body>
</html>

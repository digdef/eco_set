<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset=utf-8>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @yield('meta')

    <!-- favicons -->
    <link rel="shortcut icon" href="/images/favicons/favicon.ico" type="image/x-icon"/>
    <link rel="apple-touch-icon" sizes="57x57" href="/images/favicons/apple-touch-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="/images/favicons/apple-touch-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="/images/favicons/apple-touch-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="/images/favicons/apple-touch-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="/images/favicons/apple-touch-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="/images/favicons/apple-touch-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="/images/favicons/apple-touch-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="/images/favicons/apple-touch-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="/images/favicons/apple-touch-icon-180x180.png">
    <link rel="icon" type="image/png" href="/images/favicons/favicon-16x16.png" sizes="16x16">
    <link rel="icon" type="image/png" href="/images/favicons/favicon-32x32.png" sizes="32x32">
    <link rel="icon" type="image/png" href="/images/favicons/favicon-96x96.png" sizes="96x96">
    <link rel="icon" type="image/png" href="/images/favicons/android-chrome-192x192.png" sizes="192x192">
    <meta name="msapplication-square70x70logo" content="images/favicons/smalltile.png"/>
    <meta name="msapplication-square150x150logo" content="images/favicons/mediumtile.png"/>
    <meta name="msapplication-wide310x150logo" content="images/favicons/widetile.png"/>
    <meta name="msapplication-square310x310logo" content="images/favicons/largetile.png"/>
    <meta name="yandex-verification" content="e315c70ec11aba6b" />

    <!--styles-->


    <link rel="stylesheet" href="/css/libs/owlcarousel/owl.carousel.min.css">

    <link rel="stylesheet" href="/css/libs/owlcarousel/owl.theme.default.min.css">

    <link rel="stylesheet" href="/css/libs/owlcarousel/jquery.fancybox.min.css">

    <link rel="stylesheet" href="/css/libs/range/ion.rangeSlider.min.css">

    <link rel="stylesheet" href="/css/libs/animate/animate.css">

    <link rel="stylesheet" type="text/css" href="/css/style.css"/>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-112613336-1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'UA-112613336-1');
    </script>

</head>

<body>
@include('layouts.header')
<div class="main-wrapper">
    @yield('content')
    @include('layouts.footer')
</div>
@yield('script')
</body>
</html>

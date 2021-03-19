<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="{{ $metaDescription ?? '' }}">

    <meta name="keywords" content="German Journal of Veterinary Research, GMPC Thesis &amp; Opinions Platform, German Journal of Microbiology, German Multidisciplinary Publishing Center, GMPC, Veterinary, Microbiology, Knowledge Globalization, Scientific journals">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ $metaTitle ?? config('app.name') }}</title>

    <link rel="stylesheet" type="text/css" href="{{asset('ui-assets')}}/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <link rel="stylesheet" href="{{asset('ui-assets')}}/css/owl.carousel.min.css" />
    <link rel="stylesheet" href="{{asset('ui-assets')}}/css/owl.theme.default.min.css" />
    <link rel="stylesheet" type="text/css" media="all" href="{{asset('ui-assets')}}/css/main.css" />
    <link rel="stylesheet" type="text/css" media="all" href="{{asset('ui-assets')}}/css/common.css" />
    <link rel="stylesheet" type="text/css" media="all" href="{{asset('ui-assets')}}/css/style-J1.css" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous" />
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet" />

    <!-- Favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="{{asset('ui-assets')}}/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="{{asset('ui-assets')}}/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('ui-assets')}}/favicon/favicon-16x16.png">
    <link rel="manifest" href="{{asset('ui-assets')}}/favicon/site.webmanifest">
    <link rel="mask-icon" href="{{asset('ui-assets')}}/favicon/safari-pinned-tab.svg" color="#5bbad5">
    <!-- Favicon-->
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">
</head>
<body class="{{ $class ?? '' }}">

@yield('content')

@include('includes.user_footer')

@stack('js')

<script src="{{asset('ui-assets')}}/js/jquery-3.3.1.min.js"></script>
<script src="{{asset('ui-assets')}}/js/bootstrap.min.js"></script>
<script src="{{asset('ui-assets')}}/js/owl.carousel.min.js"></script>
<script src="{{asset('ui-assets')}}/js/jquery.countTo.min.js"></script>
<script src="{{asset('ui-assets')}}/js/main.js"></script>
<script async src="https://static.addtoany.com/menu/page.js"></script>
<script>
    var desc = $(".desc");
    var f_top = desc.position().top;
    $(window).one("scroll", function () {
        if ($(window).scrollTop() + $(window).height() >= f_top) {
            var i = 0;
            var txt = 'Our vision is to serve science by enhancing"Knowledge Globalization".';
            var speed = 50;

            (function typeWriter() {
                if (i < txt.length) {
                    document.getElementById("vision").innerHTML += txt.charAt(i);
                    i++;
                    setTimeout(typeWriter, speed);
                }
            })();
            var n = 0;
            var txt2 =
                'Our mission is to facilitate the dissemination of natural scientific researches among a broad range of scientific communities rapidly and efficiently. Publishing theses reviews on our international portal is one of our mission aiming to spotlight on scientific outcomes that are written in languages other than English.';
            var speed2 = 50;

            (function typeWriter2() {
                if (n < txt2.length) {
                    document.getElementById("mission").innerHTML += txt2.charAt(n);
                    n++;
                    setTimeout(typeWriter2, speed2);
                }
            })();
        }
    });
</script>
<script>
    $(document).ready(function () {

        $('.timer').countTo();


    });
</script>
<script>
    var tar = document.getElementById("btn-download");
    var link = document.getElementById("article");
    tar.addEventListener('click', function () {
        link.dispatchEvent(new MouseEvent('click'));
        console.log(link);
    })
</script>
</body>
</html>

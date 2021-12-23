<!DOCTYPE html>
<html>
<head>
    <title>Home</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="format-detection" content="telephone=no">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <!-- Fonts-->
    <link rel="stylesheet" type="text/css" href="{{asset('front')}}/assets/fonts/fontawesome/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="{{asset('front')}}/assets/fonts/pe-icon/pe-icon.css">
    <!-- Vendors-->
    <link rel="stylesheet" type="text/css" href="{{asset('front')}}/assets/vendors/bootstrap/grid.css">
    <link rel="stylesheet" type="text/css" href="{{asset('front')}}/assets/vendors/magnific-popup/magnific-popup.min.css">
    <link rel="stylesheet" type="text/css" href="{{asset('front')}}/assets/vendors/swiper/swiper.css">
    <!-- App & fonts-->
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600,700|Open+Sans:400,700">
    <link rel="stylesheet" type="text/css" id="app-stylesheet" href="{{asset('front')}}/assets/css/main.css"><!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <![endif]-->
    @toastr_css
</head>

<body>
<div class="page-wrap" id="root">

    <!-- header -->
    <header class="header header--fixed">
        <div class="header__inner">
            <div class="header__logo"><a href="{{url('/')}}"><img src="{{asset('front')}}/assets/img/logo.jpg" alt="" style="width: 122px;"/></a></div>

           @foreach($categories as $category)

            <div style="background : #464646">
                <a href="{{route('category',$category->slug)}}">{{$category->name}}</a>

            </div>

            @endforeach

            <div class="navbar-toggle" id="fs-button">
                <div class="navbar-icon"><span></span></div>
            </div>
        </div>

        <!-- fullscreenmenu__module -->
        <div class="fullscreenmenu__module" trigger="#fs-button">

            <!-- overlay-menu -->
            <nav class="overlay-menu">

                <!--  -->
                <br>
                <ul class="wil-menu-list">
                    <li class="current-menu-item">
                        <a href="{{url('/')}}">Anasayfa</a>
                    </li>
                    <li>
                        <a href="{{url('yazilar')}}">Yazılar</a>
                    </li>
                    <li>
                        <a href="{{url('iletisim')}}">İletişim</a>
                    </li>
                    <li>
                        <a href="{{route('hakkimda')}}">About</a>
                    </li>
                </ul><!--  -->

            </nav><!-- End / overlay-menu -->

        </div><!-- End / fullscreenmenu__module -->

    </header><!-- End / header -->

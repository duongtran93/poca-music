<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Poca - Podcast &amp; Audio Template">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Title -->
    <title>Poca - Podcast &amp; Audio</title>
{{--    <base href="{{ asset('') }}">--}}

<!-- Favicon -->
    <link rel="icon" href="{{ asset('storage/source/img/core-img/favicon.ico') }}">

    <!-- Core Stylesheet -->
    <link rel="stylesheet" href="{{ asset('storage/source/style.css') }}">
    <link rel="stylesheet" href="{{ asset('storage/source/css/bootstrap.min.css') }}">

</head>

<body>
<header class="header-area">
    <!-- Main Header Start -->
    <div class="main-header-area">
        <div class="classy-nav-container breakpoint-off">
            <!-- Classy Menu -->
            <nav class="classy-navbar justify-content-between" id="pocaNav">

                <!-- Logo -->
                <a class="nav-brand" href="{{ route('welcome') }}"><img src="{{ asset('storage/source/img/core-img/logo.png') }}" alt=""></a>

                <!-- Navbar Toggler -->
                <div class="classy-navbar-toggler">
                    <span class="navbarToggler"><span></span><span></span><span></span></span>
                </div>

                <!-- Menu -->
                <div class="classy-menu">

                    <!-- Menu Close Button -->
                    <div class="classycloseIcon">
                        <div class="cross-wrap"><span class="top"></span><span class="bottom"></span></div>
                    </div>

                    <!-- Nav Start -->
                    <div class="classynav">
                        <ul id="nav">
                            <li class="current-item"><a href="{{ route('welcome') }}">Trang chủ</a></li>
                            <li><a href="#">Top Hot</a></li>
                            <li><a href="">Chủ Đề</a></li>
                            <li><a href="">Album</a></li>
                            <li><a href="#">Nghệ Sĩ</a></li>
                        </ul>

                        <!-- Top Search Area -->
                        <div class="top-search-area">
                            <form action="" method="post">
                                <input type="search" name="top-search-bar" class="form-control" placeholder="Search and hit enter...">
                                <button type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
                            </form>
                        </div>

                        <!-- Top Social Area -->
                        <div class="top-social-area">
                            <a class="nav-link" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <img src="{{asset('storage/images/user3.png')}}" style="width: 40px; height: 40px; border-radius: 50%">
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown" style="min-width: 1rem">
                                <a class="dropdown-item" href="{{ route('login') }}">Đăng nhập</a>
                                <div class="dropdown-divider"></div>
                                @if (Route::has('register'))
                                    <a class="dropdown-item" href="{{ route('register') }}">Đăng ký</a>
                                @endif
                            </div>
                        </div>

                    </div>
                    <!-- Nav End -->
                </div>
            </nav>
        </div>
    </div>
</header>

@yield('content')

<!-- ******* All JS ******* -->
<!-- jQuery js -->
<script src="{{ asset('storage/source/js/jquery.min.js') }}"></script>
<!-- Popper js -->
<script src="{{ asset('storage/source/js/popper.min.js') }}"></script>
<!-- Bootstrap js -->
<script src="{{ asset('storage/source/js/bootstrap.min.js') }}"></script>
<!-- All js -->
<script src="{{ asset('storage/source/js/poca.bundle.js') }}"></script>
<!-- Active js -->
<script src="{{ asset('storage/source/js/default-assets/active.js') }}"></script>

</body>

</html>

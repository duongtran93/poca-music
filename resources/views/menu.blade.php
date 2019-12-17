
<header class="header-area" style="background-color: #2b303b">
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
                            <li><a href="{{ route('welcome') }}">Trang chủ</a></li>
                            <li><a href="{{route('songs.songNew')}}">Bài Hát Mới Nhất</a></li>
                            <li><a href="{{route('song.listenTheMost')}}">Nghe Nhiều Nhất</a></li>
                            <li><a href="#">Nghệ Sĩ</a></li>
                        </ul>

                        <!-- Top Search Area -->
                        <div class="top-search-area">
                            <form action="{{route('songs.search')}}" method="get">
                                @csrf
                                <input type="text" name="search" class="form-control" placeholder="Search and hit enter...">
                                <button type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
                            </form>
                        </div>

                        <!-- Top Social Area -->
                        <div class="top-social-area">
                            <a class="nav-link" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <img src="{{asset('storage/images/user3.png')}}" style="width: 40px; height: 40px; border-radius: 50%">
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown" style="min-width: 1rem">
                                <a href="{{ route('login') }}" class="btn dropdown-item" role="button">Đăng nhập</a>
                                <div class="dropdown-divider"></div>
                                @if (Route::has('register'))
                                    <a href="{{ route('register') }}" class="btn dropdown-item" role="button">Đăng ký</a>
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

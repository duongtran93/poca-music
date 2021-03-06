<header class="header-area" style="background-color: #2b303b">
    <!-- Main Header Start -->
    <div class="main-header-area">
        <div class="classy-nav-container breakpoint-off">
            <!-- Classy Menu -->
            <nav class="classy-navbar justify-content-between" id="pocaNav">

                <!-- Logo -->
                <a class="nav-brand" href="{{ route('home') }}"><img src="{{ asset('storage/source/img/core-img/logo.png') }}" alt=""></a>

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
                            <li><a href="{{ route('home') }}">Trang Chủ</a></li>
                            <li><a href="{{route('song.songNew')}}">Bài Hát Mới Nhất </a></li>
                            <li><a href="{{route('song.listenTheMost')}}">Nghe Nhiều Nhất </a></li>
                            <li><a href="{{route('singer.index')}}">Nghệ Sĩ</a></li>
                        </ul>

                        <!-- Top Search Area -->
                        <div class="top-search-area">
                            <form action="{{route('song.search')}}" method="get">
                                @csrf
                                <input id="search" type="search" name="search" class="form-control" placeholder="Tìm kiếm và nhấn enter ...">
                                <button type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
                            </form>
                            <div class="resultSearch mt-2">
                                <div id="result"></div>
                                <div id="playlist"></div>
                                <div id="singer"></div>
                            </div>
                        </div>

                        <!-- Top Social Area -->
                        <div class="top-social-area">
                            @guest
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                                @if (Route::has('register'))
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                    </li>
                                @endif
                            @else
                                <li class="nav-item dropdown">
                                    <a id="navbarDropdown" style="color: white" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                        <img src="{{ asset('storage/avatar/'.Auth::user()->avatar) }}" style="width: 40px; height: 40px;border-radius: 50%">
                                        {{ Auth::user()->name }} <span class="caret"></span>
                                    </a>

                                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="{{ route('user.index', Auth::user()->name) }}">Trang Cá Nhân</a>
                                        <a class="dropdown-item" href="{{ route('user.edit', Auth::user()->id) }}" style="margin-left: 0">Đổi Thông Tin</a>
                                        <a class="dropdown-item" href="{{ route('user.editpass') }}" style="margin-left: 0">Đổi Mật Khẩu</a>
                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();" style="margin-left: 0">
                                            Đăng Xuất
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            @csrf
                                        </form>
                                    </div>
                                </li>
                            @endguest
                        </div>

                    </div>
                    <!-- Nav End -->
                </div>
            </nav>
        </div>
    </div>
</header>

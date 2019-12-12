
<div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="login-form">
                <form action="{{ route('login') }}" method="post">
                    @csrf
                    <h2 class="text-center">Login</h2>
                    <div class="text-center social-btn">
                        <a href="redirect/facebook" class="btn btn-primary btn-block"><i class="fa fa-facebook"></i> Login with <b>Facebook</b></a>
                        <a href="#" class="btn btn-danger btn-block"><i class="fa fa-google"></i> Login with <b>Google</b></a>
                    </div>
                    <div class="or-seperator"><i>or</i></div>
                    <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="Email" required autocomplete="email" autofocus>

                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Password">

                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-success btn-block login-btn">Login</button>
                    </div>
                    <div class="clearfix">
                        <label class="pull-left checkbox-inline" for="remember">
                        <input type="checkbox" id="remember" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me</label>
                        @if (Route::has('password.request'))
                            <a href="{{ route('password.request') }}" class="pull-right text-success">Forgot Password?</a>
                        @endif
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="registerModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="signup-form">
                <form action="{{ route('register') }}" method="post">
                    @csrf
                    <h2>Sign Up</h2>
                    <hr>
                    <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-user"></i></span>
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" placeholder="User Name" required autocomplete="name" autofocus>

                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="Email Address" required autocomplete="email">

                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Password" required autocomplete="new-password">

                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group">
				<span class="input-group-addon">
					<i class="fa fa-lock"></i>
					<i class="fa fa-check"></i>
				</span>
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="Confirm Password" required autocomplete="new-password">
                        </div>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-lg">Sign Up</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

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
{{--                                <a class="dropdown-item" data-toggle="modal" data-target="#exampleModal">Đăng nhập</a>--}}
                                <button type="button" class=" btn dropdown-item" data-toggle="modal" data-target="#loginModal">Đăng nhập</button>
                                <div class="dropdown-divider"></div>
                                @if (Route::has('register'))
                                    <button type="button" class=" btn dropdown-item" data-toggle="modal" data-target="#registerModal">Đăng ký</button>
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

@extends('layouts.app')
@section('content')
@include('menu')

<div class="limiter">
    <div class="container-login100">
        <div class="wrap-login100">
            <form class="login100-form validate-form" method="post" action="{{ route('login') }}">
                @csrf
					<span class="login100-form-title p-b-43">
						Login
					</span>


                <div class="wrap-input100 validate-input" data-validate = "Email is required">
                    <input class="input100 @error('email') is-invalid @enderror" id="email" type="email" name="email" value="{{ old('email') }}"  autocomplete="email" autofocus>
                    <span class="focus-input100"></span>
                    <span class="label-input100">Email</span>
                </div>
                @error('email')
                    <strong class="text-danger">* {{ $message }}</strong>
                @enderror

                <div class="wrap-input100 validate-input" data-validate="Password is required">
                    <input class="input100 @error('password') is-invalid @enderror" id="password" type="password" name="password"  autocomplete="current-password">
                    <span class="focus-input100"></span>
                    <span class="label-input100">Password</span>
                </div>
                @error('password')
                    <strong class="text-danger">* {{ $message }}</strong>
                @enderror

                <div class="flex-sb-m w-full p-t-3 p-b-32">
                    <div class="contact100-form-checkbox">
                        <input class="input-checkbox100" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                        <label class="label-checkbox100" for="remember">
                            Remember me
                        </label>
                    </div>

                    <div>
                        @if (Route::has('password.request'))
                            <a class="txt1" href="{{ route('password.request') }}">
                                Forgot Password?
                            </a>
                        @endif
                    </div>
                </div>


                <div class="container-login100-form-btn">
                    <button type="submit" class="login100-form-btn">
                        Login
                    </button>
                </div>

                <div class="text-center p-t-46 p-b-20">
						<span class="txt2">
							or login using
						</span>
                </div>

                <div class="login100-form-social flex-c-m">
                    <a href="redirect/facebook" class="login100-form-social-item flex-c-m bg1 m-r-5">
                        <i class="fa fa-facebook-f" aria-hidden="true"></i>
                    </a>

                    <a href="#" class="login100-form-social-item flex-c-m bg2 m-r-5">
                        <i class="fa fa-google" aria-hidden="true"></i>
                    </a>
                </div>
            </form>

            <div class="login100-more" style="background-image: url('{{asset('storage/Login/images/bg-01.jpg')}}');">
            </div>
        </div>
    </div>
</div>
@endsection

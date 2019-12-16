@extends('layouts.app')
@section('content')
@include('menu')

<div class="limiter">
    <div class="container-login100">
        <div class="wrap-login100">
            <form class="login100-form validate-form" method="post" action="{{ route('register') }}">
                @csrf
                <span class="login100-form-title p-b-43">
						Register
				</span>


                <div class="wrap-input100 validate-input">
                    <input id="name" type="text" class="input100 @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                    <span class="focus-input100"></span>
                    <span class="label-input100">Name</span>
                </div>
                @error('name')
                <strong class="text-danger">* {{ $message }}</strong>
                @enderror

                <div class="wrap-input100 validate-input">
                    <input id="email" type="email" class="input100 @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                    <span class="focus-input100"></span>
                    <span class="label-input100">Email Address</span>
                </div>
                @error('email')
                <strong class="text-danger">* {{ $message }}</strong>
                @enderror

                <div class="wrap-input100 validate-input">
                    <input id="password" type="password" class="input100 @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                    <span class="focus-input100"></span>
                    <span class="label-input100">Password</span>
                </div>
                @error('password')
                <strong class="text-danger">* {{ $message }}</strong>
                @enderror

                <div class="wrap-input100 validate-input">
                    <input id="password-confirm" type="password" class="input100" name="password_confirmation" required autocomplete="new-password">
                    <span class="focus-input100"></span>
                    <span class="label-input100">Confirm Password</span>
                </div>


                <div class="container-login100-form-btn">
                    <button type="submit" class="login100-form-btn">
                        Register
                    </button>
                </div>

            </form>

            <div class="login100-more" style="background-image: url('{{asset('storage/Login/images/bg-01.jpg')}}');">
            </div>
        </div>
    </div>
</div>
@endsection

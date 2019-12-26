@extends('layouts.app')
@section('content')
@include('menu')

<div class="limiter">
    <div class="container-login100">
        <div class="wrap-login100">
            <form class="login100-form validate-form" method="post" action="{{ route('register') }}">
                @csrf
                <span class="login100-form-title p-b-43">
						Đăng kí
				</span>
                <h6 class="mb-2">Tên</h6>
                <div class="form-control mb-4">
                    <input type="text" name="name">
                </div>
                @error('name')
                <strong class="text-danger">* {{ $message }}</strong>
                @enderror
                <h6 class="mt-4 mb-2">Email</h6>
                <div class="form-control mb-4">
                    <input type="email" name="email">
                </div>
                @error('email')
                <strong class="text-danger">* {{ $message }}</strong>
                @enderror
                <h6 class="mt-4 mb-2">Mật khẩu</h6>
                <div class="form-control mb-4">
                    <input type="password" name="password"  id="password">
                    <span id="toggle-password" toggle="#password-field" class="fa fa-fw fa-eye field_icon" style="position: relative;float: right"></span>
                </div>
                @error('password')
                <strong class="text-danger">* {{ $message }}</strong>
                @enderror
                <h6 class="mt-4 mb-2">Xác nhận mật khẩu</h6>
                <div class="form-control mb-4">
                    <input type="password" name="password_confirmation"  id="password-confirm">
                    <span id="toggle-password-confirm" toggle="#password-field" class="fa fa-fw fa-eye field_icon" style="position: relative;float: right"></span>
                </div>
                <div class="container-login100-form-btn">
                    <button type="submit" class="login100-form-btn">
                        Đăng kí
                    </button>
                </div>

            </form>

            <div class="login100-more" style="background-image: url('{{asset('storage/Login/images/bg-01.jpg')}}');">
            </div>
        </div>
    </div>
</div>
@endsection

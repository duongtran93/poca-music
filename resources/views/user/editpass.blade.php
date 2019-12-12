@extends('layouts.app')
@section('content')
@include('menu-user')
<div class="container">
    <div class="d-flex justify-content-center h-100">
        <div class="card-changer-pass">
            <div class="card-header">
                <h3>Đổi Mật Khẩu</h3>
            </div>
            <div class="card-body">
                <form method="post" action="{{route('user.updatepass')}}">
                    @csrf
                    <div class="input-group form-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Mật khẩu cũ</span>
                        </div>
                        <input type="password" class="form-control" name="old_password">
                    </div>
                    @if($errors->has('old_password'))
                        <p class="text-danger">* {{ $errors->first('old_password') }}</p>
                    @endif
                    <div class="input-group form-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Mật khẩu mới</span>
                        </div>
                        <input type="password" class="form-control"  name="new_password">
                    </div>
                    @if($errors->has('new_password'))
                        <p class="text-danger">* {{ $errors->first('new_password') }}</p>
                    @endif
                    <div class="input-group form-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Nhập lại mật khẩu</span>
                        </div>
                        <input type="password" class="form-control" name="password_confirm">

                    </div>
                        @if($errors->has('password_confirm'))
                            <p class="text-danger">* {{ $errors->first('password_confirm') }}</p>
                        @endif
                    <div class="form-group d-flex justify-content-center">
                        <button type="submit" class="btn update_btn">Đổi Mật Khẩu</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@include('footer')
@endsection

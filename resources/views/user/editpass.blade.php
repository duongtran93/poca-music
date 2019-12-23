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
                <form id="editpass-form" method="post" action="{{route('user.updatepass')}}">
                    @csrf
                    <h6 class="mt-4 mb-2">Mật khẩu cũ</h6>
                    <div class="form-control mb-4">
                        <input type="password" name="old_password" id="old-password">
                        <span id="toggle-old-password" toggle="#password-field" class="fa fa-fw fa-eye field_icon" style="position: relative;float: right"></span>
                    </div>
                    @if($errors->has('old_password'))
                        <p class="text-danger">* {{ $errors->first('old_password') }}</p>
                    @endif
                    <h6 class="mt-4 mb-2">Mật khẩu mới</h6>
                    <div class="form-control mb-4">
                        <input type="password" name="new_password" id="new-password">
                        <span id="toggle-new-password" toggle="#password-field" class="fa fa-fw fa-eye field_icon" style="position: relative;float: right"></span>
                    </div>
                    @if($errors->has('new_password'))
                        <p class="text-danger">* {{ $errors->first('new_password') }}</p>
                    @endif
                    <h6 class="mt-4 mb-2">Nhập lại mật khẩu</h6>
                    <div class="form-control mb-4">
                        <input type="password" name="password_confirm" id="password-confirm">
                        <span id="toggle-password-confirm" toggle="#password-field" class="fa fa-fw fa-eye field_icon" style="position: relative;float: right"></span>
                    </div>
                        @if($errors->has('password_confirm'))
                            <p class="text-danger">* {{ $errors->first('password_confirm') }}</p>
                        @endif
                    <div class="form-group d-flex justify-content-center">
                        <button id="edit-password" type="submit" class="btn update_btn">Đổi Mật Khẩu</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@include('footer')
@endsection

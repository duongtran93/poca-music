@extends('layouts.app')
@section('content')
@include('menu-user')
<div class="container my-4">
    <div class="row d-flex justify-content-center">
        <div class="col-6">
            <p class="display-4 text-primary">Đổi Mật Khẩu</p>
            <form method="post" action="{{route('user.updatepass')}}">
                @csrf
                <div class="form-group">
                    <label>Mật khẩu cũ</label>
                    <input type="password" class="form-control" name="old_password">
                    @if($errors->has('old_password'))
                        <p class="text-danger">* {{ $errors->first('old_password') }}</p>
                        @endif
                </div>
                <div class="form-group">
                    <label>Mật khẩu mới</label>
                    <input type="password" class="form-control" name="new_password">
                    @if($errors->has('new_password'))
                        <p class="text-danger">* {{ $errors->first('new_password') }}</p>
                    @endif
                </div>
                <div class="form-group">
                    <label>Nhập lại mật khẩu</label>
                    <input type="password" class="form-control" name="password_confirm">
                    @if($errors->has('password_confirm'))
                        <p class="text-danger">* {{ $errors->first('password_confirm') }}</p>
                    @endif
                </div>
                <button type="submit" class="btn btn-primary">Đổi Mật Khẩu</button>
            </form>
        </div>
    </div>
</div>
@include('footer')
@endsection

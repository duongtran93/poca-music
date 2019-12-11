@extends('layouts.app')
@section('content')
@include('menu-user')
<div class="container my-4">
    <div class="row d-flex justify-content-center">
        <div class="col-6">
            <h2 class="display-4 text-primary">Chỉnh Sửa Thông Tin</h2>
            <form method="post" action="{{route('user.update', $user->id)}}">
                @csrf
                <div class="form-group">
                    <label>Name</label>
                    <input type="text" class="form-control" name="name" value="{{$user->name}}">
                </div>
                <div class="form-group">
                    <label>Email</label>
                    <input type="email" class="form-control" name="email" value="{{$user->email}}" disabled>
                </div>
                <button type="submit" class="btn btn-primary">Lưu Thông Tin</button>
            </form>
        </div>
    </div>
</div>
@include('footer')
@endsection

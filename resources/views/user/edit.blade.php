@extends('layouts.app')
@section('content')
    @include('menu-user')
    <div class="container">
        <div class="d-flex justify-content-center h-100">
            <div class="card-edit-profile">
                <div class="card-header">
                    <h3>Chỉnh Sửa Thông Tin</h3>
                </div>
                <div class="card-body">
                    <form method="post" action="{{route('user.update', $user->id)}}">
                        @csrf
                        <div class="input-group form-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Name</span>
                            </div>
                            <input type="text" class="form-control" name="name" value="{{$user->name}}">
                        </div>
                        <div class="input-group form-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Email</span>
                            </div>
                            <input type="email" class="form-control" name="email" value="{{$user->email}}" disabled>
                        </div>
                        <div class="form-group d-flex justify-content-center">
                            <button type="submit" class="btn update_btn ">Lưu thông tin</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @include('footer')
@endsection

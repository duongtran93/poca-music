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
                    <form method="post" action="{{route('user.update', $user->id)}}" enctype="multipart/form-data">
                        @csrf
                        <h6 class="mb-2">Name</h6>
                        <div class="form-control mb-4">
                            <input type="text" name="name" value="{{$user->name}}">
                        </div>
                        @if($errors->has('name'))
                            <p class="text-danger">* {{ $errors->first('name') }}</p>
                        @endif
                        <h6 class="mt-4 mb-2">Email</h6>
                        <div class="form-control  mb-4">
                            <input type="text" name="email" value="{{$user->email}}" disabled>
                        </div>
                        <h6 class="mt-4 mb-2">Phone</h6>
                        <div class="form-control  mb-4">
                            <input type="text" name="phone" value="{{$user->phone}}">
                        </div>
                        @if($errors->has('phone'))
                            <p class="text-danger">* {{ $errors->first('phone') }}</p>
                        @endif
                        <h6 class="mt-4 mb-2">Address</h6>
                        <div class="form-control  mb-4">
                            <input type="text" name="address" value="{{$user->address}}">
                        </div>
                        @if($errors->has('address'))
                            <p class="text-danger">* {{ $errors->first('address') }}</p>
                        @endif
                        <h6 class="mt-4 mb-2">Avatar</h6>
                        <div class="  mb-4">
                            <img src="{{asset('storage/avatar/'.$user->avatar)}}" style="width: 50px;height: 50px">
                            <input type="file" name="avatar">
                        </div>
                        <div class="form-group d-flex justify-content-center">
                            <button id="update-profile" type="submit" class="btn update_btn ">Lưu thông tin</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @include('footer')
@endsection

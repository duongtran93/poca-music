@extends('layouts.app')

@section('content')
    @include('menu-user')
    <div class="container mt-100">
        <div class="card">
            <h5 class="card-header">Chỉnh sửa bài hát</h5>
            <div class="card-body">
                <form method="post" action="{{route('song.update', $song->id)}}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="name">Tên</label>
                        <input type="text" class="form-control" name="name" value="{{$song->name}}" >
                        @if($errors->has('name'))
                            <p class="text-danger">*{{$errors->first('name')}}</p>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="description">Miêu tả</label>
                        <textarea type="text" class="form-control" name="description" >{{$song->desc}}</textarea>
                        @if($errors->has('description'))
                            <p class="text-danger">*{{$errors->first('description')}}</p>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="song">Bài hát</label>
                        <input type="file" class="form-control" name="song" accept="audio/*" value="{{$song->file}}" >
                    </div>
                    <div class="form-group">
                        <label for="image">Ảnh</label>
                        <img src="{{asset('storage/' . $song->image)}}" style="width: 50px ; height: 50px">
                        <input type="file" class="form-control" name="image" accept=".png, .jpg, .jpeg" >
                        @if($errors->has('image'))
                            <p class="text-danger">*{{$errors->first('image')}}</p>
                        @endif
                    </div>
                    <button type="submit" class="btn btn-primary">Cập nhật</button>
                    <a href="{{route('user.index')}}" class="btn btn-dark">Hủy bỏ</a>
                </form>
            </div>
        </div>
    </div>
    @include('footer')
    @endsection

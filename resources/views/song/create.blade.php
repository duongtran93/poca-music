@extends('layouts.app')
@section('content')
    @include('menu-user')
    <div class="container mt-100">
        <div class="card">
            <h5 class="card-header" style="color: white">Tạo mới bài hát</h5>
            <div class="card-body">
                <form method="post" action="{{route('song.store')}}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="name">Tên</label>
                        <input type="text" class="form-control" id="name" name="name">
                        @if($errors->has('name'))
                            <p class="text-danger">*{{$errors->first('name')}}</p>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="description">Miêu tả</label>
                        <textarea type="text" class="form-control" id="description" name="description"></textarea>
                        @if($errors->has('description'))
                            <p class="text-danger">*{{$errors->first('description')}}</p>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="song">Bài hát</label>
                        <input type="file" id="song" name="song" accept="audio/*" >
                        @if($errors->has('song'))
                            <p class="text-danger">*{{$errors->first('song')}}</p>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="image">Ảnh</label>
                        <input type="file" id="image" name="image">
                        @if($errors->has('image'))
                            <p class="text-danger">*{{$errors->first('image')}}</p>
                        @endif
                    </div>
                    <button type="submit" class="btn btn-primary" >Tạo</button>
                    <a href="{{route('user.index')}}" class="btn btn-dark">Hủy bỏ</a>
                </form>
            </div>
        </div>
    </div>
    @include('footer')
    @endsection

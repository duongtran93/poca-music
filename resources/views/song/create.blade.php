@extends('layouts.app')
@section('content')
    @include('menu-user')
    <div class="container mt-100">
        <div class="card">
            <h5 class="card-header" style="color: white">Create Song</h5>
            <div class="card-body">
                <form method="post" action="{{route('song.store')}}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" id="name" name="name">
                        @if($errors->has('name'))
                            <p class="text-danger">*{{$errors->first('name')}}</p>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea type="text" class="form-control" id="description" name="description"></textarea>
                        @if($errors->has('description'))
                            <p class="text-danger">*{{$errors->first('description')}}</p>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="song">Song</label>
                        <input type="file" id="song" name="song" accept="audio/*" >
                        @if($errors->has('song'))
                            <p class="text-danger">*{{$errors->first('song')}}</p>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="image">Image</label>
                        <input type="file" id="image" name="image">
                        @if($errors->has('image'))
                            <p class="text-danger">*{{$errors->first('image')}}</p>
                        @endif
                    </div>
                    <button type="submit" class="btn btn-primary" >Submit</button>
                    <a href="{{route('user.index')}}" class="btn btn-dark">Cancel</a>
                </form>
            </div>
        </div>
    </div>
    @include('footer')
    @endsection

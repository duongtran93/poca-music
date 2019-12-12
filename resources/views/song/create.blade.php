@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="card">
            <h5 class="card-header">Create Song</h5>
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
                        <input type="file" class="form-control" id="song" name="song" accept="audio/*" >
                        @if($errors->has('song'))
                            <p class="text-danger">*{{$errors->first('song')}}</p>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="image">Image</label>
                        <input type="file" class="form-control" id="image" name="image" accept=".png, .jpg, .jpeg"  >
                        @if($errors->has('image'))
                            <p class="text-danger">*{{$errors->first('image')}}</p>
                        @endif
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>

    @endsection

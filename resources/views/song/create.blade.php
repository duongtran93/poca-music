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
                    </div>
                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea type="text" class="form-control" id="description" name="description"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="song">Song</label>
                        <input type="file" class="form-control" id="song" name="song" accept="audio/*" >
                    </div>
                    <div class="form-group">
                        <label for="image">Image</label>
                        <input type="file" class="form-control" id="image" name="image" accept=".png, .jpg, .jpeg"  >
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
    hello

    @endsection

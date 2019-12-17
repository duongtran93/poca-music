@extends('layouts.app')
@section('content')
    @include('menu-user')
    <div class="user-profile-top-menu">
        <div class="wrap">
            <div class="content-wrap">
                <ul>
                    <li>
                        <a href="{{ route('home') }}" class="active">
                            <img class="icon-home" src="{{ asset('storage/images/home.png') }}" alt="">
                        </a>
                    </li>
                    <li>
                        <a href="{{route('playlist.index')}}">Playlist</a>
                    </li>
                    <li>
                        <a href="{{ route('song.create') }}">Upload</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="card mt-5">
            <h5 class="card-header">Song List</h5>
            <div class="card-body">
                <table class="table table-bordered">
                    <thead class="thead-dark">
                    <tr>
                        <th scope="col">STT</th>
                        <th scope="col">Name</th>
                        <th scope="col">Description</th>
                        <th scope="col">Image</th>
                        <th scope="col">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($songs as $key => $song)
                        <tr>
                            <th scope="row">{{++ $key}}</th>
                            <td><a href="{{route('songs.listen', $song->id)}}">{{$song->name}}</a> <span class="badge badge-info">{{$song->category['name']}}</span></td>
                           <td>{!! $song->desc !!}</td>
                            <td><img src="{{asset('storage/'. $song->image)}}" style="width: 80px "></td>
                            <td>
                                <a href="{{route('song.edit', $song->id)}}"><button class="btn btn-success">Edit</button></a>
                                <a href="{{route('song.delete', $song->id)}}" onclick="return confirm('Bạn có chắc chắn muốn xóa?')">
                                    <button class="btn btn-danger">Delete</button>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    @include('footer')
@endsection

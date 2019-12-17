@extends('layouts.app')
@section('content')
    @include('menu-user')
    <div class="container">
        <h2>Bài Hát Mới Nhất </h2>
        <div class="row">
            @foreach($songs as $song)
                <a href="{{route('songs.listen', $song->id)}}">
                    <div class="col-3 mt-3">
                        <div class="card h-100">
                            <img src="{{asset('storage/'. $song->image)}}" class="card-img-top"
                                 alt="..." style="height: 230px ">
                            <a href="{{route('songs.listen', $song->id)}}"><h5>{{$song->name}}</h5></a>
                        </div>
                    </div>
                </a>
            @endforeach
        </div>
    </div>

    @include('footer')
@endsection


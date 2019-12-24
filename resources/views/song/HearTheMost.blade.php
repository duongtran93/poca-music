@extends('layouts.app')
@section('content')
    @include('menu')
    <div class="container">
        <h2>Bài Hát Được Nghe Nhiều Nhất  </h2>
        <div class="row">
            @foreach($songs as $song)
                <a href="{{route('songs.listen', $song->id)}}">
                    <div class="col-3 mt-3">
                        <div class="card h-100">
                            <img src="{{asset('storage/'. $song->image)}}" class="card-img-top"
                                 alt="..." style="width:100%;height: 200px;border-radius: 50%">
                            <a href="{{route('songs.listen', $song->id)}}">
                                <h5 class="text-center">{{$song->name}}</h5>
                            </a>
                        </div>
                    </div>
                </a>
            @endforeach
        </div>
    </div>

    @include('footer')
@endsection

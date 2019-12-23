@extends('layouts.app')
@section('content')
    @include('menu')
    <div class="container">
        <h2>Bài Hát Mới Nhất </h2>
        <div class="row">
            @foreach($songs as $song)
                <a href="{{route('song.listen', $song->id)}}">
                    <div class="col-3 mt-3">
                        <div class="card h-100">
                            <img src="{{asset('storage/'. $song->image)}}" class="card-img-top mb-3 m-3"
                                 alt="..." style="width:87%;height: 200px;border-radius: 50%">
                            <a href="{{route('song.listen', $song->id)}}">
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

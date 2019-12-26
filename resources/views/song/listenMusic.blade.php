@extends('layouts.app')
@section('content')
    @include('menu-user')
        @include('menu')
        <div class="poca-music-area mt-100 d-flex align-items-center flex-wrap ml-2 mr-2" data-animation="fadeInUp"
             data-delay="900ms">
            <div class="poca-music-thumbnail">
                <img src="{{ asset('storage/' . $song->image) }}" style="width: 100%;height: 200px">
            </div>
            <div class="poca-music-content">
                <span class="music-published-date">December 9, 2019</span>
                <h2 style="color: black">{{$song->name}}</h2>
                <div class="music-meta-data">
                    <p>By <a href="#" class="music-author">{{$song->user->name}}</a></p>
                </div>
                <div class="poca-music-player">
                    <audio preload="auto" controls>
                        <source src="{{ asset('storage/' . $song->file) }}">
                    </audio>
                </div>
                <div class="likes-share-download d-flex align-items-center justify-content-between">
                    <div>
                        <span class="ml-2" style="color: #a6a6a6; font-size: 14px;"><i class="fa fa-headphones" aria-hidden="true"></i> Lượt Nghe ({{$song->listen_count}})</span>
                    </div>
                    <div>
                        <a href="#" class="mr-4"><i class="fa fa-share-alt" aria-hidden="true"></i> Share(04)</a>
                        <a href="#"><i class="fa fa-download" aria-hidden="true"></i> Download (12)</a>
                    </div>
                </div>
            </div>
        </div>
    <div class="container mt-4">
        <div class="row">
            <div>
                <h3>Lời Bài Hát :</h3><br>
                {!! $song->desc !!}
            </div>
        </div>
    </div>
    @include('footer')
@endsection


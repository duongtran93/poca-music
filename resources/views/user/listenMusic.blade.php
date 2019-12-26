@extends('layouts.app')
@section('content')
    @include('menu-user')
    <div class="poca-music-area mt-100 d-flex align-items-center flex-wrap ml-2 mr-2" data-animation="fadeInUp" data-delay="900ms" data-songid="{{ $song->id }}">
        <div class="poca-music-thumbnail">
            <img src="{{ asset('storage/' . $song->image) }}" style="width: 100%;height: 200px">
        </div>
        <div class="poca-music-content">
            <span class="music-published-date">December 9, 2019</span>
            <h2 style="color: black">{{$song->name}}</h2>
            <div class="music-meta-data">
                By <a href="#" class="music-author">{{$song->user->name}}</a>
            </div>
            <div class="poca-music-player">
                <audio preload="auto" controls>
                    <source src="{{ asset('storage/' . $song->file) }}">
                </audio>
            </div>
            <div class="likes-share-download d-flex align-items-center justify-content-between">
                <div>
                <a href="#" class="like">{{ Auth::user()->likes()->where('song_id', $song->id)->first() ? Auth::user()->likes()->where('song_id', $song->id)->first()->like == 1 ? 'You like this song' : 'Like' : 'Like'  }}</a> |
                <a href="#" class="like">{{ Auth::user()->likes()->where('song_id', $song->id)->first() ? Auth::user()->likes()->where('song_id', $song->id)->first()->like == 0 ? 'You dont like this song' : 'Dislike' : 'Dislike'  }}</a>
                <span class="ml-2" style="color: #a6a6a6; font-size: 14px;"><i class="fa fa-headphones" aria-hidden="true"></i> Lượt Nghe ({{$song->listen_count}})</span>
                </div>
                <div>
                    {{--                    <a href="#" class="mr-4"><i class="fa fa-plus" aria-hidden="true"></i> Thêm vào</a>--}}
                    <div class="dropdown">
                        <a class="mr-4" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fa fa-plus" aria-hidden="true"></i> Thêm vào playlist
                        </a>

                        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                            <a class="dropdown-item" data-toggle="modal" data-target="#playlistModal" style="cursor: pointer">Tạo playlist</a>
                            @foreach($playlists as $playlist)
                                <a class="dropdown-item addSongToPlaylist" href="{{ route('playlist.addSong', ['playlist_id'=>$playlist->id, 'song_id'=>$song->id]) }}">{{ $playlist->name }}</a>
                            @endforeach
                        </div>
                    </div>
                    {{--                    <a href="#"><i class="fa fa-download" aria-hidden="true"></i> Download (12)</a>--}}
                </div>
            </div>
            <div id="messageAdd" class="text-center"></div>
        </div>
        <div id="topic">
            <a href="#" class="badge badge-primary">Primary</a>
            <a id="addTopic" href="#">Manager topics</a><br>
            <div id="inputtag">
                <form action="" method="post">
                    <input name="tagName" id="tagName" class="form-control" type="text" data-role="tagsinput" value="">
                    <div id="tagList"></div>
                    <button type="button" class="btn btn-outline-dark">Done</button>
                </form>
            </div>
        </div>
    </div>
    <div class="container mt-40">
        <div class="row">
            <div>
                <h3>Lời Bài Hát :</h3><br>
                {!! $song->desc !!}
            </div>
        </div>
    </div>

    <div class="modal fade" id="playlistModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="playlist-form">
                    <form action="{{route('playlist.store')}}" method="post">
                        @csrf
                        <h2 class="text-center">Tạo playlist mới</h2>
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Nhập tên playlist" autofocus name="name">
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-success btn-block playlist-btn mt-2">Lưu</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    @include('footer')
    <script>
        let token = '{{ \Illuminate\Support\Facades\Session::token() }}';
        let urlLike = '{{ route('song.like') }}';
    </script>
@endsection


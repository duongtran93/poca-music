@extends('layouts.app')
@section('content')
    @include('menu-user')
    <div class="poca-music-area mt-100 d-flex align-items-center flex-wrap ml-2 mr-2" data-animation="fadeInUp"
         data-delay="900ms" data-songid="{{ $song->id }}">
        <div class="poca-music-thumbnail">
            <img src="{{ asset('storage/' . $song->image) }}" style="width: 100%;height: 200px">
        </div>
        <div class="poca-music-content">
            <span class="music-published-date">26, tháng 12, 2019</span>
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
                    <a href="#"
                       class="like">{{ Auth::user()->likes()->where('song_id', $song->id)->first() ? Auth::user()->likes()->where('song_id', $song->id)->first()->like == 1 ? 'You like this song' : 'Like' : 'Like'  }}</a>
                    |
                    <a href="#"
                       class="like">{{ Auth::user()->likes()->where('song_id', $song->id)->first() ? Auth::user()->likes()->where('song_id', $song->id)->first()->like == 0 ? 'You dont like this song' : 'Dislike' : 'Dislike'  }}</a>
                    <span class="ml-2" style="color: #a6a6a6; font-size: 14px;"><i class="fa fa-headphones"
                                                                                   aria-hidden="true"></i> Lượt Nghe ({{$song->listen_count}})</span>
                </div>
                <div>
                    {{--                    <a href="#" class="mr-4"><i class="fa fa-plus" aria-hidden="true"></i> Thêm vào</a>--}}
                    <div class="dropdown">
                        <a class="mr-4" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown"
                           aria-haspopup="true" aria-expanded="false">
                            <i class="fa fa-plus" aria-hidden="true"></i> Thêm vào playlist
                        </a>

                        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                            <a class="dropdown-item" data-toggle="modal" data-target="#playlistModal"
                               style="cursor: pointer">Tạo playlist</a>
                            @foreach($playlists as $playlist)
                                <a class="dropdown-item addSongToPlaylist"
                                   href="{{ route('playlist.addSong', ['playlist_id'=>$playlist->id, 'song_id'=>$song->id]) }}">{{ $playlist->name }}</a>
                            @endforeach
                        </div>
                    </div>
                    {{--                    <a href="#"><i class="fa fa-download" aria-hidden="true"></i> Download (12)</a>--}}
                </div>
            </div>
            <div id="messageAdd" class="text-center"></div>
        </div>
        <div id="topic">
            @foreach($tags as $tag)
            <a href="{{ route('tags.index', $tag->id) }}" class="badge badge-primary">{{ $tag->name }}</a>
            @endforeach
            <a id="addTopic" href="#">Gắn Tags</a><br>
            <div id="inputtag">
                <form action="{{ route('tags.create', $song->id) }}" method="post">
                    @csrf
                    <div class="row">
                        <input name="tagName" id="tagName" class="form-control col-8 ml-3" type="text" value="">
                        <button type="submit" class="btn btn-outline-dark col-3 ml-2">Xong</button>
                    </div>
                    <div id="tagList" style="position: absolute"></div>
                </form>
            </div>
            @foreach($singers as $singer)
            <a href="{{ route('singer.information', $singer->id) }}" class="badge badge-info">{{ $singer->name }}</a>
            @endforeach
            <a id="addSinger" href="#">Thêm Ca Sĩ</a><br>
            <div id="inputSinger">
                <form action="{{ route('singer.addSingers', $song->id) }}" method="post">
                    @csrf
                    <div class="row">
                        <input name="tagSinger" id="tagSinger" class="form-control col-8 ml-3" type="text" value="">
                        <button type="submit" class="btn btn-outline-dark col-3 ml-2">Xong</button>
                    </div>
                    <div id="singerList" style="position: absolute"></div>
                </form>
            </div>
        </div>
    </div>
    <div class="container mt-40">
        <div class="row mt-5">
            <h3>Bình luận</h3><br>
            <div class="container">
                <div class="card" style="background-color: white">
                    <div class="card-body">
                        <div class="row p-3" style="background-color: #f9f9f9;border-radius: 20px">
                            <div class="col-2">
                                <img src="{{asset('storage/avatar/'.\Illuminate\Support\Facades\Auth::user()->avatar)}}"
                                     style="width: 50px;height: 50px;border-radius: 50%">
                            </div>
                            <div class="col-10">
                                <form action="{{route('song.commentSong',$song->id)}}" method="post">
                                    @csrf
                                    <input name="comment_song" type="text" class="form-control" style="border-radius: 20px"
                                           placeholder="Viết bình luận...">
                                </form>
                            </div>
                        </div>
                        @foreach($comments as $comment)
                            <div class="row mt-4">
                                <div class="col-md-2">
                                    <img src="{{asset('storage/avatar/'.$comment['user']->avatar)}}"
                                         class="img img-rounded img-fluid"
                                         style="width: 50px;height: 50px;border-radius: 50%">
                                    {{--                                <p class="text-secondary text-center">{{$comment->}}</p>--}}
                                </div>
                                <div class="col-md-10">
                                    <h5>{{$comment['user']->name}}</h5>
                                    <p>{{$comment->content}}</p>
                                </div>
                            </div>
                            <div class="card card-inner">
                                <div class="card-body">
                                    <div class="row">
                                        @foreach($comment['reply_comments'] as $reply_comment)
                                            <div class="col-md-2 mb-4"
                                                 style="background-color: #f9f9f9">
                                                <img src="{{asset('storage/avatar/'.$reply_comment['user']->avatar)}}"
                                                     class="img img-rounded img-fluid"
                                                     style="width: 30px;height: 30px;border-radius: 50%"/>
                                                {{--                                                <p class="text-secondary text-center">15 Minutes Ago</p>--}}
                                            </div>
                                            <div class="col-md-10">
                                                <h5>{{$reply_comment['user']->name}}</h5>
                                                <p>{{$reply_comment['content']}}</p>
                                            </div>
                                        @endforeach
                                        <div class="col-2">
                                            <img
                                                src="{{asset('storage/avatar/'.\Illuminate\Support\Facades\Auth::user()->avatar)}}"
                                                style="width: 30px;height: 30px;border-radius: 50%">
                                        </div>
                                        <div class="col-10">
                                            <form action="{{route('song.replyCommentSong',$comment->id)}}"
                                                  method="post">
                                                @csrf
                                                <input name="reply_comment_song" type="text" style="border-radius: 20px"
                                                       placeholder="Viết phản hồi..." class="form-control">
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
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
                            <input type="text" class="form-control" placeholder="Nhập tên playlist" autofocus
                                   name="name">
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


@extends('layouts.app')
@section('content')
    @include('menu-user')
    <div class="container" style="margin-top: 80px">
        <div class="row">
            <div class="col-4" style="height: auto">
                <div class="col-10 mt-lg-4">
                    <div class="card h-100" data-playlistid="{{ $playlist->id }}">
                        <img src="{{asset('storage/'.$playlist->image)}}" class="card-img-top"
                             alt="..." style="height: 230px ">
                        <div class="row">
                            <div class="col-8">
                                <h5>{{$playlist->name}}</h5>
                            </div>
                            <div class="col-4">
                                <div class="dropdown">
                                    <button class="btn" type="button" id="dropdownMenu2"
                                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="float: right">
                                        <img src="https://img.icons8.com/ios-glyphs/20/000000/ellipsis.png">
                                    </button>
                                    <div class="dropdown-menu text-center" aria-labelledby="dropdownMenu2">
                                        <button class="dropdown-item" type="button" data-toggle="modal" data-target="#playlistModal">Sửa</button>
                                        <a href="{{route('playlist.delete', $playlist->id)}}" onclick="return confirm('Bạn có chắc chắn muốn xóa?')">
                                        <button class="dropdown-item" type="button">Xóa</button>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <a href="#" class="like-playlist">{{ Auth::user()->playlistlikes()->where('playlist_id', $playlist->id)->first() ? Auth::user()->playlistlikes()->where('playlist_id', $playlist->id)->first()->like == 1 ? 'You like this playlist' : 'Like' : 'Like'  }}</a> |
                                <a href="#" class="like-playlist">{{ Auth::user()->playlistlikes()->where('playlist_id', $playlist->id)->first() ? Auth::user()->playlistlikes()->where('playlist_id', $playlist->id)->first()->like == 0 ? 'You dont like this song' : 'Dislike' : 'Dislike'  }}</a>
                            </div>
                        </div>
                    </div>
                    <div>
                        <a href="{{ route('playlist.listen', $playlist->id) }}"><h2>Nghe Playlist Này</h2></a>
                    </div>
                </div>
            </div>
            <div class="col-8 mt-3" style="height: auto">
                <h1>Danh sách bài hát</h1>
                <table class="table table-bordered">
                    <thead class="thead-dark">
                    <tr>
                        <th scope="col">STT</th>
                        <th scope="col">Tên</th>
                        <th scope="col">Miêu tả</th>
                        <th scope="col">Ảnh</th>
                        <th scope="col">Hoạt động</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($songs as $key => $song)
                        <tr id="songId">
                            <th scope="row">{{++ $key}}</th>
                            <td><a href="{{route('song.listen', $song->id)}}">{{$song->name}}</a> <span class="badge badge-info">{{$song->category['name']}}</span></td>
                            <td>{!! $song->desc !!}</td>
                            <td><img src="{{asset('storage/'. $song->image)}}" style="width: 80px ;height: 80px"></td>
                            <td>
                                <a class="deleteSongInPlaylist" href="{{route('playlist.deleteSong', ['playlist_id'=>$playlist->id, 'song_id'=>$song->id])}}">
                                    <button class="btn btn-danger">Xóa khỏi playlist này</button>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <div id="messageDelete" class="text-center"></div>
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
                                <form action="{{route('playlist.comment',$playlist->id)}}" method="post">
                                    @csrf
                                    <input name="comment" type="text" class="form-control" style="border-radius: 20px"
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
                                            <form action="{{route('playlist.reply_comment',$comment->id)}}"
                                                  method="post">
                                                @csrf
                                                <input name="reply_comment" type="text" style="border-radius: 20px"
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
                    <form action="{{route('playlist.update', $playlist->id)}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <h2 class="text/var/www/html/test-center">Thay đổi thông tin Playlist</h2>
                        <h6>Tên</h6>
                        <div class="input-group">
                            <input type="text" class="form-control"  autofocus name="name" value="{{$playlist->name}}" required>
                        </div>
                        <h6>Ảnh</h6>
                        <div class="input-group">
                            <img src="{{asset('storage/'.$playlist->image)}}" style="width: 50px;height: 50px">
                            <input type="file" name="image">
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
        let urlLikePlaylist = '{{ route('playlist.like') }}'
    </script>
@endsection


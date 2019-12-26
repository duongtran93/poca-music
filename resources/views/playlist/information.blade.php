@extends('layouts.app')
@section('content')
    @include('menu')
    <div class="container">
        <div class="row">
            <div class="col-4" style="height: auto">
                <div class="col-10 mt-lg-4">
                    <div class="card h-100" data-playlistid="{{ $playlist->id }}">
                        <img src="{{asset('storage/images/anhtaboemroi.jpeg')}}" class="card-img-top"
                             alt="..." style="height: 230px ">
                        <div class="row">
                            <div class="col-6">
                                <h5>{{$playlist->name}}</h5>
                            </div>
                            <div class="col-6">
                                <div class="dropdown">
                                    <button class="btn" type="button" id="dropdownMenu2"
                                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="float: right">
                                        <img src="https://img.icons8.com/ios-glyphs/20/000000/ellipsis.png">
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
                                        <button class="dropdown-item" type="button" data-toggle="modal" data-target="#playlistModal">Edit</button>
                                        <a href="{{route('playlist.delete', $playlist->id)}}" onclick="return confirm('Bạn có chắc chắn muốn xóa?')">
                                        <button class="dropdown-item" type="button">Delete</button>
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
                </div>
            </div>
            <div class="col-8" style="height: auto">
                <h1>List Song</h1>
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
                        <tr id="songId">
                            <th scope="row">{{++ $key}}</th>
                            <td><a href="{{route('song.listen', $song->id)}}">{{$song->name}}</a> <span class="badge badge-info">{{$song->category['name']}}</span></td>
                            <td>{!! $song->desc !!}</td>
                            <td><img src="{{asset('storage/'. $song->image)}}" style="width: 80px "></td>
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
    <div class="modal fade" id="playlistModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="playlist-form">
                    <form action="{{route('playlist.update', $playlist->id)}}" method="post">
                        @csrf
                        <h2 class="text-center">Thay đổi tên Playlist</h2>
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Nhập tên playlist" autofocus name="name" value="{{$playlist->name}}" >
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

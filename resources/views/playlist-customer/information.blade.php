@extends('layouts.app')
@section('content')
    @include('menu')
    <div class="container pt-3">
        <h6>Playlist</h6>
        <div class="row">
            <div class="col-4 play-playlist" style="height: auto">
                <div class="col-10 mt-lg-4">
                    <div class="card h-100">
                        <img src="{{asset('storage/'.$playlist->image)}}" class="card-img-top"
                             alt="..." style="height: 230px ">
                        <div class="row">
                            <div class="col-12">
                                <h5 class="text-center">{{$playlist->name}}</h5>
                            </div>
                        </div>
                    </div>
                    <div>
                        <a href="{{ route('playlist.listenGuest', $playlist->id) }}"><h2>Nghe Playlist Này</h2></a>
                    </div>
                </div>
            </div>
            <div class="col-8" style="height: auto">
                <h1>Danh sách bài hát</h1>
                <table class="table table-bordered">
                    <thead class="thead-dark">
                    <tr>
                        <th scope="col">STT</th>
                        <th scope="col">Tên</th>
                        <th scope="col">Miêu tả</th>
                        <th scope="col">Ảnh</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($songs as $key => $song)
                        <tr>
                            <th scope="row">{{++ $key}}</th>
                            <td><a href="{{route('songs.listen', $song->id)}}">{{$song->name}}</a> <span
                                    class="badge badge-info">{{$song->category['name']}}</span></td>
                            <td>{!! $song->desc !!}</td>
                            <td><img src="{{asset('storage/'. $song->image)}}" style="width: 80px ;height: 80px"></td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="container mt-40">
        <div class="row mt-5">
            <h3>Bình luận</h3><br>
            <div class="container">
                <div class="card" style="background-color: white">
                    <div class="card-body">
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
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('footer')
@endsection

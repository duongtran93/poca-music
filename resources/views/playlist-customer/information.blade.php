@extends('layouts.app')
@section('content')
    @include('menu')
    <div class="container pt-3">
        <div class="row">
            <div class="col-4" style="height: auto">
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
                            <td><a href="{{route('songs.listen', $song->id)}}">{{$song->name}}</a> <span class="badge badge-info">{{$song->category['name']}}</span></td>
                            <td>{!! $song->desc !!}</td>
                            <td><img src="{{asset('storage/'. $song->image)}}" style="width: 80px ;height: 80px"></td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    @include('footer')
@endsection

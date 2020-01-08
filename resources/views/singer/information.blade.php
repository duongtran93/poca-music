@extends('layouts.app')
@section('content')
    @include('menu-user')
    <div class="container pt-3">
        <div class="row">
            <div class="col-3 mt-lg-4">
                <div class="card">
                    <img src="{{asset('storage/SingerAvatar/'. $singer->image)}}" class="card-img-top"
                         style="width:100%;height: 200px;border-radius: 50%">
                    <h5 class="text-center">{{$singer->name}}</h5>
                </div>
                <div>
                    <a href="{{ route('singer.listen', $singer->id) }}"><h2>Nghe Playlist Của {{$singer->name }}</h2></a>
                </div>
            </div>
            <div class="col-9 mt-lg-4" style="height: auto">
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
                        <tr id="songId">
                            <th scope="row">{{++ $key}}</th>
                            <td><a href="{{route('song.listen', $song->id)}}">{{$song->name}}</a> <span
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
    @include('footer')
@endsection

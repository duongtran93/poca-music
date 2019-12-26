@extends('layouts.app')
@section('content')
    @include('menu-user')
    <div class="container pt-3">
        <div class="row">
            <div class="col-12">
                <h2>Playlist</h2>
                <div class="row row-cols-1 row-cols-md-3">
                    <div class="col-3 mt-lg-4">
                        <a data-toggle="modal" data-target="#playlistModal" style="cursor: pointer">
                            <div class="card card-body h-100 d-flex justify-content-center add"
                                 style="background-color: darkmagenta;">
                                <div>
                                    <img src="https://img.icons8.com/ios/100/000000/add.png">
                                </div>
                                <p class="mt-2" style="color: white;font-size: 25px">Tạo playlist mới</p>
                            </div>
                        </a>
                    </div>
                    @foreach($playlists as $playlist )
                        <a href="{{route('playlist.information',$playlist->id)}}">
                            <div class="col-3 mt-lg-4">
                                <div class="card h-100">
                                    <img src="{{asset('storage/'.$playlist->image)}}" class="card-img-top"
                                         alt="..." style="width:100%;height: 200px;border-radius: 50%">
                                    <a href="{{route('playlist.information',$playlist->id)}}">
                                        <h5 class="text-center">{{$playlist->name}}</h5></a>
                                    <p class="text-center">Tạo bởi {{\Illuminate\Support\Facades\Auth::user()->name}}</p>
                                </div>
                            </div>
                        </a>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="playlistModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="playlist-form">
                    <form action="{{route('playlist.store')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <h2 class="text-center">Tạo playlist mới</h2>
                        <h6>Tên</h6>
                        <div class="input-group">
                            <input type="text" class="form-control" autofocus name="name" required>
                        </div>
                        <h6 class="mt-2">Ảnh</h6>
                        <div class="input-group">
                            <input type="file" name="image" required>
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
@endsection


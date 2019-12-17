@extends('layouts.app')
@section('content')
    @include('menu-user')
    <div class="container">
        <div class="row">
            <div class="col-4" style="height: auto">
                <div class="col-10 mt-lg-4">
                    <div class="card h-100">
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
                                        <button class="dropdown-item" type="button">Delete</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-8" style="height: auto">
                <h1>list song</h1>
            </div>
        </div>
    </div>
    <div class="modal fade" id="playlistModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="playlist-form">
                    <form action="#" method="post">
                        @csrf
                        <h2 class="text-center">Thay đổi tên Playlist</h2>
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Nhập tên playlist" autofocus name="name" >
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

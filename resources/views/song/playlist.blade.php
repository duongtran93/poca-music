@extends('layouts.app')
@section('content')
    @include('menu-user')
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h2>Playlist</h2>
                    <div class="row row-cols-1 row-cols-md-3">
                        <div class="col-3 mt-lg-4">
                            <a data-toggle="modal" data-target="#playlistModal">
                                <div class="card card-body h-100 d-flex justify-content-center add"
                                     style="background-color: darkmagenta;">
                                    <div>
                                        <img src="https://img.icons8.com/ios/100/000000/add.png">
                                    </div>
                                    <p class="mt-2" style="color: white;font-size: 25px">Tạo playlist mới</p>
                                </div>
                            </a>
                        </div>
                        <div class="col-3 mt-lg-4">
                            <div class="card h-100">
                                <img src="{{asset('storage/images/anhtaboemroi.jpeg')}}" class="card-img-top"
                                     alt="..." style="height: 230px ">
                                <h5>Card title</h5>
                                <p>This is a short card.</p>
                            </div>
                        </div>
                        <div class="col-3 mt-lg-4">
                            <div class="card h-100">
                                <img src="{{asset('storage/images/anhtaboemroi.jpeg')}}" class="card-img-top"
                                     alt="..." style="height: 230px ">
                                <h5>Card title</h5>
                                <p>This is a short card.</p>
                            </div>
                        </div>
                        <div class="col-3 mt-lg-4">
                            <div class="card h-100">
                                <img src="{{asset('storage/images/anhtaboemroi.jpeg')}}" class="card-img-top"
                                     alt="..." style="height: 230px ">
                                <h5>Card title</h5>
                                <p>This is a short card.</p>
                            </div>
                        </div>
                        <div class="col-3 mt-lg-4">
                            <div class="card h-100">
                                <img src="{{asset('storage/images/anhtaboemroi.jpeg')}}" class="card-img-top"
                                     alt="..." style="height: 230px ">
                                <h5>Card title</h5>
                                <p>This is a short card.</p>
                            </div>
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
                    <form action="#" method="post">
                        @csrf
                        <h2 class="text-center">Tạo playlist mới</h2>
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Nhập tên playlist" autofocus>
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
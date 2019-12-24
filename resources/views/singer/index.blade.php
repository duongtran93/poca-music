@extends('layouts.app')
@section('content')
    @include('menu-user')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2>List Singer</h2>
                <div class="row row-cols-1 row-cols-md-3">
                    <div class="col-3 mt-lg-4">
                        <a href="{{route('singer.create')}}" style="cursor: pointer">
                            <div class="card card-body h-100 d-flex justify-content-center add"
                                 style="background-color: darkmagenta;">
                                <div>
                                    <img src="https://img.icons8.com/ios/100/000000/add.png">
                                </div>
                                <p class="mt-2" style="color: white;font-size: 25px">Tạo ca sĩ mới</p>
                            </div>
                        </a>
                    </div>
                    @foreach($singers as $singer )
                            <div class="col-3 mt-lg-4">
                                <div class="card h-100">
                                    <img src="{{asset('storage/SingerAvatar/'. $singer->image)}}" class="card-img-top"
                                         style="width:100%;height: 200px;border-radius: 50%">
                                    <h5 class="text-center">{{$singer->name}}</h5>
                                </div>
                            </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    @include('footer')
@endsection


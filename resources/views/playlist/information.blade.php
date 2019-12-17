@extends('layouts.app')
@section('content')
    @include('menu-user')
    <div class="container">
        <div class="row">
            <div class="col-4" style="height: auto">
                <div class="col-3 mt-lg-4">
                    <div class="card h-100">
                        <img src="{{asset('storage/images/anhtaboemroi.jpeg')}}" class="card-img-top"
                             alt="..." style="height: 230px ">
                        <a href="{{route('playlist.information',$playlist->id)}}"><h5>{{$playlist->name}}</h5></a>
                        <p>Tạo bởi {{\Illuminate\Support\Facades\Auth::user()->name}}</p>
                    </div>
                </div>
            </div>
            <div class="col-8" style="height: auto">
                dsfdsaf
            </div>
        </div>
    </div>
    @include('footer')
@endsection

@extends('layouts.app')
@section('content')
    @include('menu-user')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="col-3 mt-lg-4">
                    <div class="card h-100">
                        <img src="{{asset('storage/SingerAvatar/'. $singer->image)}}" class="card-img-top"
                             style="width:100%;height: 200px;border-radius: 50%">
                            <h5 class="text-center">{{$singer->name}}</h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('footer')
    @endsection

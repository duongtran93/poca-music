@extends('layouts.app')
@section('content')
    @include('menu')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2>List Singer</h2>
                <div class="row row-cols-1 row-cols-md-3">
                    @foreach($singers as $singer )
                        <div class="col-3 mt-lg-4">
                            <div class="card h-100">
                                <img src="{{asset('storage/SingerAvatar/'. $singer->image)}}" class="card-img-top"
                                     style="width:100%;height: 200px;border-radius: 50%">
                                <a href="{{route('singer.informationGuest' , $singer->id)}}">
                                    <h5 class="text-center">{{$singer->name}}</h5>
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    @include('footer')
    @endsection

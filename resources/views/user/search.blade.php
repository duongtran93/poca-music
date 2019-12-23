@extends('layouts.app')
@section('content')
    @include('menu-user')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2>Search result</h2>
                <div class="row row-cols-1 row-cols-md-3">
                    @foreach($songs as $song )
                        <div class="col-3 mt-lg-4">
                            <div class="card h-100">
                                <img src="{{asset('storage/'.$song->image)}}" class="card-img-top"
                                     alt="..." style="height: 230px ">
                                <a href="{{route('songs.listen',$song->id)}}"><h5>{{$song->name}}</h5></a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    @include('footer')
@endsection



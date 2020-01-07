@extends('layouts.app')
@section('content')
    @include('menu-user')
    <div class="container pt-3">
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
    <div class="container mt-40">
        <div class="row mt-5">
            <h3>Bình luận</h3><br>
            <div class="container">
                <div class="card" style="background-color: white">
                    <div class="card-body">
                        <div class="row p-3" style="background-color: #f9f9f9;border-radius: 20px">
                            <div class="col-2">
                                <img src="{{asset('storage/avatar/'.\Illuminate\Support\Facades\Auth::user()->avatar)}}"
                                     style="width: 50px;height: 50px;border-radius: 50%">
                            </div>
                            <div class="col-10">
                                <form action="{{route('singer.comment',$singer->id)}}" method="post">
                                    @csrf
                                    <input name="comment" type="text" class="form-control" style="border-radius: 20px"
                                           placeholder="Viết bình luận...">
                                </form>
                            </div>
                        </div>
                        @foreach($comments as $comment)
                            <div class="row mt-4">
                                <div class="col-md-2">
                                    <img src="{{asset('storage/avatar/'.$comment['user']->avatar)}}"
                                         class="img img-rounded img-fluid"
                                         style="width: 50px;height: 50px;border-radius: 50%">
                                    {{--                                <p class="text-secondary text-center">{{$comment->}}</p>--}}
                                </div>
                                <div class="col-md-10">
                                    <h5>{{$comment['user']->name}}</h5>
                                    <p>{{$comment->content}}</p>
                                </div>
                            </div>
                            <div class="card card-inner">
                                <div class="card-body">
                                    <div class="row">
                                        @foreach($comment['reply_comments'] as $reply_comment)
                                            <div class="col-md-2 mb-4"
                                                 style="background-color: #f9f9f9">
                                                <img src="{{asset('storage/avatar/'.$reply_comment['user']->avatar)}}"
                                                     class="img img-rounded img-fluid"
                                                     style="width: 30px;height: 30px;border-radius: 50%"/>
                                                {{--                                                <p class="text-secondary text-center">15 Minutes Ago</p>--}}
                                            </div>
                                            <div class="col-md-10">
                                                <h5>{{$reply_comment['user']->name}}</h5>
                                                <p>{{$reply_comment['content']}}</p>
                                            </div>
                                        @endforeach
                                        <div class="col-2">
                                            <img
                                                src="{{asset('storage/avatar/'.\Illuminate\Support\Facades\Auth::user()->avatar)}}"
                                                style="width: 30px;height: 30px;border-radius: 50%">
                                        </div>
                                        <div class="col-10">
                                            <form action="{{route('singer.reply_comment',$comment->id)}}"
                                                  method="post">
                                                @csrf
                                                <input name="reply_comment" type="text" style="border-radius: 20px"
                                                       placeholder="Viết phản hồi..." class="form-control">
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('footer')
    @endsection

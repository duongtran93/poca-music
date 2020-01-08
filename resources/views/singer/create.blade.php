@extends('layouts.app')
@section('content')
    @include('menu-user')
    <div class="container mt-100">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <h5 class="card-header" style="color: white">Tạo mới ca sĩ</h5>
                    <div class="card-body">
                        <form method="post" action="{{route('singer.store')}}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label>Tên</label>
                                <input type="text" class="form-control" name="name">
                            </div>
                            @if ($errors->has('name'))
                                <p class="text-danger">*{{$errors->first('name')}}</p>
                            @endif
                            <div class="form-group">
                                <label>Ảnh</label>
                                <input type="file" name="image">
                                @if ($errors->has('image'))
                                    <p class="text-danger">*{{$errors->first('image')}}</p>
                                @endif
                            </div>
                            <button type="submit" class="btn btn-dark mt-2">Lưu</button>
                            @if (\Illuminate\Support\Facades\Session::has('error'))
                                <div class="alert alert-warning" role="alert">
                                    {{ session('error') }}
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @endif
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('footer')
@endsection

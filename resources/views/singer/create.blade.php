@extends('layouts.app')
@section('content')
    @include('menu-user')
    <div class="container mt-100">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <h5 class="card-header">Create Singer</h5>
                    <div class="card-body">
                        <form method="post" action="{{route('singer.store')}}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label>Name</label>
                                <input type="text" class="form-control" name="name">
                            </div>
                            <div class="form-group">
                                <label>Image</label>
                                <input type="file" class="form-control" name="image">
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                            @if (\Illuminate\Support\Facades\Session::has('error'))
                                <div class="alert alert-warning" role="alert">
                                    {{ session('error') }}
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

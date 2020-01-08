<div class="container mt-3">
    <h2 style="text-align: center">Bài Hát Mới Nhất </h2>
    <div class="row">
        @foreach($songs as $song)
            <a href="{{route('song.listen', $song->id)}}">
                <div class="col-3 mt-3">
                    <div class="card h-100">
                        <img src="{{asset('storage/'. $song->image)}}" class="card-img-top"
                             alt="..." style="width:100%;height: 200px;border-radius: 50%">
                        <a href="{{route('song.listen', $song->id)}}">
                            <h5 class="text-center">{{$song->name}}</h5>
                        </a>
                    </div>
                </div>
            </a>
        @endforeach
    </div>
</div>
<div class="container mt-3">
    <h2 style="text-align: center">PlayList Mới Tạo</h2>
    <div class="row">
        @foreach($playlists as $playlist )
            <a href="{{route('playlist.information',$playlist->id)}}">
                <div class="col-3 mt-lg-4">
                    <div class="card h-100">
                        <img src="{{asset('storage/'.$playlist->image)}}" class="card-img-top"
                             alt="..." style="width:100%;height: 200px;border-radius: 50%">
                        <a href="{{route('playlist.information',$playlist->id)}}">
                            <h5 class="text-center">{{$playlist->name}}</h5></a>
                        <p class="text-center">Tạo bởi {{\Illuminate\Support\Facades\Auth::user()->name}}</p>
                    </div>
                </div>
            </a>
        @endforeach
    </div>
</div>
<div class="container mt-3">
    <h2 style="text-align: center">Bài Hát Được Nghe Nhiều Nhất  </h2>
    <div class="row">
        @foreach($songListenMost as $song)
            <a href="{{route('song.listen', $song->id)}}">
                <div class="col-3 mt-3">
                    <div class="card h-100">
                        <img src="{{asset('storage/'. $song->image)}}" class="card-img-top"
                             alt="..." style="width:100%;height: 200px;border-radius: 50%">
                        <a href="{{route('song.listen', $song->id)}}">
                            <h5 class="text-center">{{$song->name}}</h5>
                        </a>
                    </div>
                </div>
            </a>
        @endforeach
    </div>
</div>
<div class="container mt-3">
    <h2 style="text-align: center">PlayList Được Nghe Nhiều Nhất </h2>
    <div class="row">
        @foreach($playlistListenMost as $playlist )
            <a href="{{route('playlist.information',$playlist->id)}}">
                <div class="col-3 mt-lg-4">
                    <div class="card h-100">
                        <img src="{{asset('storage/'.$playlist->image)}}" class="card-img-top"
                             alt="..." style="width:100%;height: 200px;border-radius: 50%">
                        <a href="{{route('playlist.information',$playlist->id)}}">
                            <h5 class="text-center">{{$playlist->name}}</h5></a>
                        <p class="text-center">Tạo bởi {{\Illuminate\Support\Facades\Auth::user()->name}}</p>
                    </div>
                </div>
            </a>
        @endforeach
    </div>
</div>

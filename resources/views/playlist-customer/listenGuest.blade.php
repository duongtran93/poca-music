<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('storage/source/style.css') }}">
    <link rel="stylesheet" href="{{ asset('storage/source/css/bootstrap.min.css') }}">


    <style>
        .panel{ margin: 20px; padding:0px; height:34px;}
        .audio-panel{border:none !important;}
        #playlist,audio{width:100%;}
        .active a{color:#fff;text-decoration:none;}
        ul{list-style:none; margin:0px; padding:20px;}
        li{margin:0px; padding:0px;}
        li, a{transition:all 0.5s;}
        .list-group-item.active a{ text-decoration:none; color:#fff;}
        a{display:block; position:relative; width:100%;}
        li a{display:block; text-decoration:none;}
        li:hover{background-color:#333;}
        li a:hover{text-decoration:none; color: #fff;}
        a{color:#337ab7; text-decoration:none;}
    </style>
</head>
<body>

<div class="container">
    <div class="row mt-2">
        <div class="col-4">
            <div class="card h-100" data-playlistid="{{ $playlist->id }}">
                <img src="{{asset('storage/'.$playlist->image)}}" class="card-img-top"
                     alt="..." style="height: 230px ">
                <div class="d-flex justify-content-center pt-3">
                    <h5>{{$playlist->name}}</h5>
                </div>
            </div>
        </div>
        <div class="col-8">
            <div class="panel panel-default audio-panel">
                <audio id="audio" autoplay preload="auto" tabindex="0" controls>
                    <source src="{{ asset('storage/' . $firstSong->file) }}">
                </audio>
            </div>

            <ul id="playlist">
                @foreach($songs as $song)
                    <li class="list-group-item">
                        <a href="{{ asset('storage/' . $song->file) }}">
                            {{ $song->name }}
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
</div>

{{--<div class="panel panel-default audio-panel">--}}
{{--    <audio id="audio" autoplay preload="auto" tabindex="0" controls>--}}
{{--        <source src="{{ asset('storage/' . $firstSong->file) }}">--}}
{{--    </audio>--}}
{{--</div>--}}

{{--<ul id="playlist">--}}

{{--    @foreach($songs as $song)--}}
{{--                <li class=" list-group-item">--}}
{{--                    <a href="{{ asset('storage/' . $song->file) }}">--}}
{{--                        {{ $song->name }}--}}
{{--                    </a>--}}
{{--                </li>--}}
{{--            @endforeach--}}

{{--</ul>--}}

<script src="{{ asset('storage/source/js/jquery.min.js') }}"></script>
<script src="{{ asset('storage/source/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('storage/source/js/poca.bundle.js') }}"></script>
<script src="{{ asset('storage/source/js/default-assets/active.js') }}"></script>
<script>
    var audio;
    var playlist;
    var tracks;
    var current;

    init();
    function init(){
        current = 0;
        audio = $('#audio');
        playlist = $('#playlist');
        tracks = playlist.find('li a');
        len = tracks.length - 1;
        audio[0].volume = 0.5;
        audio[0].play();
        playlist.find('a').click(function(e){
            e.preventDefault();
            link = $(this);
            current = link.parent().index();
            run(link, audio[0]);
        });
        audio[0].addEventListener('ended',function(e){
            current++;
            if(current == len){
                current = 0;
                link = playlist.find('a')[0];
            }else{
                link = playlist.find('a')[current];
            }
            run($(link),audio[0]);
        });
    }
    function run(link, player){
        player.src = link.attr('href');
        par = link.parent();
        par.addClass('active').siblings().removeClass('active');
        audio[0].load();
        audio[0].play();
    }
</script>
</body>
</html>


<?php

namespace App\Http\Controllers;

use App\Service\Implement\SongService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomePageController extends Controller
{
    protected $songService;

    public function __construct(SongService $songService)
    {
        $this->songService = $songService;
    }

    public function welcome() {
        $songs = DB::table('songs')->select('id', 'name', 'image')->orderBy('created_at', 'desc')->get();
        $playlists = DB::table('playlists')->select('id' , 'name' , 'image')->orderBy('created_at', 'desc')->get();
        $songListenMost = DB::table('songs')->select('id', 'name', 'image')->orderBy('listen_count', 'desc')->get();
        $playlistListenMost = DB::table('playlists')->select('id','name', 'image')->orderBy('listen_count', 'desc')->get();
        return view('welcome', compact('songs', 'playlists'), compact('songListenMost', 'playlistListenMost'));
    }

    public function home()
    {
        $songs = DB::table('songs')->select('id', 'name', 'image')->orderBy('created_at', 'desc')->get();
        $playlists = DB::table('playlists')->select('id' , 'name' , 'image')->orderBy('created_at', 'desc')->get();
        $songListenMost = DB::table('songs')->select('id', 'name', 'image')->orderBy('listen_count', 'desc')->get();
        $playlistListenMost = DB::table('playlists')->select('id','name', 'image')->orderBy('listen_count', 'desc')->get();
        return view('home', compact('songs', 'playlists') , compact('songListenMost', 'playlistListenMost'));
    }


}

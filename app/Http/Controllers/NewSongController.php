<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Http\Requests\SearchRequest;
use App\Service\Implement\SongService;
use App\Song;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;

class NewSongController extends Controller
{
    protected $songService;

    public function __construct(SongService $songService)
    {
        $this->songService = $songService;
    }

    public function songNew()
    {
        $songs = DB::table('songs')->select('id', 'name', 'image')->orderBy('created_at', 'desc')->get();
        return view('song.recent', compact('songs'));
    }

    public function listen($id)
    {
        Song::where('id', $id)->increment('listen_count');
        $song = $this->songService->findById($id);
        $comments = Comment::where('song_id','=',$song->id)->orderBy('created_at', 'desc')->get();
        return view('song.listenMusic', compact('song','comments'));
    }

    public function listenTheMost()
    {
        $songs = DB::table('songs')->select('id', 'name', 'image')->orderBy('listen_count', 'desc')->get();
        return view('song.HearTheMost', compact('songs'));
    }

    public function search(SearchRequest $request) {
        $keyword = $request->search;
        $songs = DB::table('songs')->where('name','LIKE','%'.$keyword.'%')->get();
        $playlists = DB::table('playlists')->where('name','LIKE','%'.$keyword.'%')->get();
        $singers = DB::table('singers')->where('name','LIKE','%'.$keyword.'%')->get();

        if ($request->ajax()) {
            $songs = DB::table('songs')->where('name','LIKE','%'.$keyword.'%')->get();
            $playlists = DB::table('playlists')->where('name','LIKE','%'.$keyword.'%')->get();
            $singers = DB::table('singers')->where('name','LIKE','%'.$keyword.'%')->get();
            return \response()->json([$songs, $playlists, $singers]);
        }
        return view('song.search', compact('songs', 'playlists', 'singers'));
    }
}

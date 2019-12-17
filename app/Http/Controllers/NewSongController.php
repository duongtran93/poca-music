<?php

namespace App\Http\Controllers;

use App\Http\Requests\SearchRequest;
use App\Service\Implement\SongService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class NewSongController extends Controller
{
    protected $songService;

    public function __construct(SongService $songService)
    {
        $this->songService = $songService;
    }

    public function songNew()
    {
        $songs = $this->songService->getAll();
        return view('song.recent', compact('songs'));
    }

    public function listen($id)
    {
        $song = $this->songService->findById($id);
        return view('song.listenMusic', compact('song'));
    }

    public function listenTheMost()
    {
        $songs = $this->songService->getAll();
        return view('song.HearTheMost', compact('songs'));
    }

    public function search(SearchRequest $request) {
        $keyword = $request->search;
        $songs = DB::table('songs')->where('name','LIKE','%'.$keyword.'%')->get();
        return view('song.search',compact('songs'));
    }
}

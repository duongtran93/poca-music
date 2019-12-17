<?php

namespace App\Http\Controllers;

use App\Service\Implement\SongService;
use Illuminate\Http\Request;

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
        return view('user.listenMusic', compact('song'));
    }

    public function listenTheMost()
    {
        $songs = $this->songService->getAll();
        return view('song.HearTheMost', compact('songs'));
    }
}

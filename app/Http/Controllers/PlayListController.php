<?php

namespace App\Http\Controllers;

use App\PlayList;
use App\Service\PlayListServiceInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PlayListController extends Controller
{
    public $playlistService;
    public function __construct(PlayListServiceInterface $playlistService)
    {
        $this->playlistService = $playlistService;
    }


    public function index()
    {
        $playlists = PlayList::where('user_id', Auth::user()->id)->get();
        return view('playlist.index', compact('playlists'));
    }

    public function create()
    {
        return view('playlist.index');
    }

    public function store(Request $request)
    {
        $this->playlistService->create($request);
        return redirect()->route('playlist.index');
    }
//
//    public function information($id){
//        $playlist = PlayList::where($id)->get();
//        return view('playlist.information');
//    }
}

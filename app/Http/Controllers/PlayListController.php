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

    public function delete($id)
    {
        $this->playlistService->delete($id);
        return redirect()->route('playlist.delete');
    }

    public function edit($id)
    {
        $playlist = $this->playlistService->findById($id);
    }

    public function update(Request $request, $id)
    {
        $this->playlistService->edit($request , $id);
        return redirect()->route('playlist.index');
    }

}

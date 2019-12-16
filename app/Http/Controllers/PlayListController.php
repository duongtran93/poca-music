<?php

namespace App\Http\Controllers;

use App\Service\PlayListServiceInterface;
use Illuminate\Http\Request;

class PlayListController extends Controller
{
    public $playlistService;
    public function __construct(PlayListServiceInterface $playlistService)
    {
        $this->playlistService = $playlistService;
    }


    public function index()
    {
        $playlists = $this->playlistService->getAll();
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
}

<?php


namespace App\Service\Implement;


use App\Playlist;
use App\Repository\PlayListRepositoryInterface;
use App\Service\PlayListServiceInterface;
use Illuminate\Support\Facades\Auth;

class PlayListService implements PlayListServiceInterface
{
    protected $playlistRepository;

    public function __construct(PlayListRepositoryInterface $playlistRepository)
    {
        $this->playlistRepository = $playlistRepository;
    }

    public function getAll()
    {
        return $this->playlistRepository->index();
    }

    public function findById($id)
    {
        return $this->playlistRepository->finById($id);
    }

    public function create($request)
    {
        $playlist = new Playlist();

        $playlist->name = $request->name;
        $playlist->user_id = Auth::user()->id;
        return $this->playlistRepository->store($playlist);
    }

}

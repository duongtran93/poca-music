<?php


namespace App\Service\Implement;


use App\PlayList;
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
        $playlist = new PlayList();

        $playlist->name = $request->name;
        $playlist->user_id = Auth::user()->id;
        return $this->playlistRepository->store($playlist);
    }

    public function delete($id)
    {
        $playlist = $this->playlistRepository->finById($id);
        return $this->playlistRepository->destroy($playlist);
    }

    public function edit($request, $id)
    {
        $playlist = $this->playlistRepository->finById($id);
        $playlist->name = $request->name;
        return $this->playlistRepository->update($playlist);
    }
}

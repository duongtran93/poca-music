<?php


namespace App\Service\Implement;


use App\Playlist;
use App\Repository\PlayListRepositoryInterface;
use App\Service\PlayListServiceInterface;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

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
        if ($request->hasFile('image')){
            $img = $request->file('image');
            $path = $img->store('images', 'public');
            $playlist->image = $path;
        }
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
        if ($request->hasFile('image')){
            $img = $request->file('image');
            $path = $img->store('images', 'public');
            $playlist->image = $path;
        }
        return $this->playlistRepository->update($playlist);
    }
}

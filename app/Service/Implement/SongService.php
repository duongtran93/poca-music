<?php


namespace App\Service\Implement;


use App\Repository\Implement\SongRepository;
use App\Service\ServiceInterface;
use App\Song;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class SongService implements ServiceInterface
{
    private $songRepository;
    public function __construct(SongRepository $songRepository)
    {
        $this->songRepository = $songRepository;
    }


    function create($request)
    {
        $newSong = new Song();
        $newSong->name = $request->name;
        $newSong->desc = $request->description;
        if ($request->hasFile('song')){
            $file = $request->file('song');
            $fileExtension = $file->getClientOriginalExtension();
            $fileName = 'songs/files/'.$request->name.time().'.'.$fileExtension;
            $file->storeAs('public/', $fileName);
            $newSong->file = $fileName;
        }
        if ($request->hasFile('image')){
            $img = $request->file('image');
            $path = $img->store('songs/images', 'public');
            $newSong->image = $path;
        }
        $newSong->user_id = Auth::user()->id;
        $this->songRepository->save($newSong);
    }
    public function findById($id)
    {
        return $this->songRepository->findById($id);
    }
    public function update($request, $id)
    {
        $song = $this->songRepository->findById($id);
        $song->name = $request->name;
        $song->desc = $request->description;
        if ($request->hasFile('song')){
            $oldSong= $song->file;
            if ($oldSong){
                Storage::disk('public')->delete($oldSong);
            }
            $newSong = $request->file('song');
            $fileExtension = $newSong->getClientOriginalExtension();
            $fileName = 'songs/files/'.$request->name.time().'.'.$fileExtension;
            $newSong->storeAs('public/', $fileName);
            $song->file = $fileName;
        }
        if ($request->hasFile('image')){
            $oldImage = $song->image;
            if ($oldImage){
                Storage::disk('public')->delete($oldImage);
            }
            $newImage = $request->image;
            $pathImage = $newImage->store('songs/images', 'public');
            $song->file = $pathImage;
        }
        $this->songRepository->save($song);
    }
    public function delete($obj)
    {
        $this->songRepository->delete($obj);
    }
}

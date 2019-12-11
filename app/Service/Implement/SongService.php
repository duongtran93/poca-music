<?php


namespace App\Service\Implement;


use App\Repository\Implement\SongRepository;
use App\Service\ServiceInterface;
use App\Song;
use Illuminate\Support\Facades\Auth;

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
            $file->storeAs('public/songs/files', $fileName);
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
}

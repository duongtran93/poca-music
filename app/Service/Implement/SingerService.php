<?php


namespace App\Service\Implement;


use App\Repository\SingerRepositoryInterface;
use App\Service\SingerServiceInterface;
use App\Singer;
use http\Env\Request;
use Illuminate\Support\Facades\Auth;

class SingerService implements  SingerServiceInterface
{
    protected $singerRepository;

    public function __construct(SingerRepositoryInterface $singerRepository)
    {
        $this->singerRepository = $singerRepository;
    }

    public function getAll()
    {
        return $this->singerRepository->index();
    }

    public function findById($id)
    {
       return $this->singerRepository->findById($id);
    }

    public function create($request)
    {
        $singer = new Singer();
        $singer->name = $request->name;
        if ($request->hasFile('image')){
            $image = $request->file('image');
            $imageExtension = $image->getClientOriginalExtension();
            $imageName= $singer->name . time() .'.' . $imageExtension;
            $image->storeAs('public/SingerAvatar', $imageName);
            $singer->image = $imageName;
        }
        $singer->user_id = Auth::user()->id;
        return $this->singerRepository->store($singer);
    }
}

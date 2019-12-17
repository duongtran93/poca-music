<?php


namespace App\Repository\Eloquent;


use App\PlayList;
use App\Repository\PlayListRepositoryInterface;

class PlayListEloquentRepository implements PlayListRepositoryInterface
{
    protected $playlist;

    public function __construct( PlayList $playlist)
    {
        $this->playlist = $playlist;
    }

    function index()
    {
        return $this->playlist->get();
    }

    function finById($id)
    {
        return $this->playlist->findOrFail($id);
    }

    function store($obj)
    {
        return $obj->save();
    }

    function destroy($obj)
    {
        return $obj->delete;
    }

    function update($obj)
    {
        return $obj->save();
    }
}

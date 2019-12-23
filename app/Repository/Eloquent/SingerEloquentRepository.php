<?php


namespace App\Repository\Eloquent;


use App\Repository\SingerRepositoryInterface;
use App\Singer;

class SingerEloquentRepository implements SingerRepositoryInterface
{

    protected $singer;

    public function __construct(Singer $singer)
    {
        $this->singer = $singer;
    }

    public function index()
    {
        return $this->singer->get();
    }

    public function findById($id)
    {
       return $this->singer->findOrFail();
    }

    public function store($obj)
    {
       return $obj->save();
    }
}

<?php


namespace App\Repository\Implement;


use App\Repository\Eloquent\RepositoryEloquent;
use App\Repository\RepositoryInterface;
use App\Song;

class SongRepository extends RepositoryEloquent implements RepositoryInterface
{

    public function getModel()
    {
        return Song::class;
    }
}

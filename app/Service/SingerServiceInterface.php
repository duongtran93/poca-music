<?php


namespace App\Service;


interface SingerServiceInterface
{
    public function getAll();
    public function findById($id);
    public function create($request);
}

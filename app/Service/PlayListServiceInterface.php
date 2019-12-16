<?php


namespace App\Service;


interface PlayListServiceInterface
{
    public function getAll();
    public function findById($id);
    public function create($request);
}

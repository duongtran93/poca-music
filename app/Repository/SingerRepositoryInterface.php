<?php


namespace App\Repository;


interface SingerRepositoryInterface
{
    public function index();
    public function findById($id);
    public function store($obj);
}

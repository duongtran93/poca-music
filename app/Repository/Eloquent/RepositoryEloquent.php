<?php


namespace App\Repository\Eloquent;


use App\Repository\RepositoryInterface;

abstract class RepositoryEloquent implements RepositoryInterface
{

    protected $model;
    public function __construct()
    {
        $this->setModel();
    }
    abstract public function getModel();
    public function setModel()
    {
        $this->model = app()->make($this->getModel());
    }

    public function save($object)
    {
        $object->save();
    }
}

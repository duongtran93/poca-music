<?php


namespace App\Repository;


interface RepositoryInterface
{
    function getAll();
    function save($object);
    function findById($id);
    function delete($obj);

}

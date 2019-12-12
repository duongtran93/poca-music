<?php


namespace App\Repository;


interface RepositoryInterface
{

    function save($object);
    function findById($id);

}

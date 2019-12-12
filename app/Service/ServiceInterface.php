<?php


namespace App\Service;


interface ServiceInterface
{
    function create($request);
    function findById($id);
}

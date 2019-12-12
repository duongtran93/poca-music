<?php


namespace App\Service;


interface ServiceInterface
{
    function create($request);
    function findById($id);
    function update($request, $id);
    function delete($obj);
}

<?php


namespace App\Repository;


interface PlayListRepositoryInterface
{
 function index();
 function finById($id);
 function store($obj);
 function destroy($obj);
 function update($obj);
}

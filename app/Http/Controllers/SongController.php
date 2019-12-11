<?php

namespace App\Http\Controllers;

use App\Service\Implement\SongService;
use Illuminate\Http\Request;

class SongController extends Controller
{
    private $songService;
    public function __construct(SongService $songService)
    {
        $this->songService = $songService;
    }
    public function create() {
        return view('song.create');
    }
    public function store(Request $request)
    {
        try {
            $message = 'Them moi thanh Cong';
            $this->songService->create($request);
                return redirect('user.index');
        }
        catch (\Exception $e){
            return $e->getMessage();
        }
    }
}

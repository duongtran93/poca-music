<?php

namespace App\Http\Controllers;

use App\Service\SingerServiceInterface;
use App\Singer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class SingerController extends Controller
{
    public $singerService;

    public function __construct(SingerServiceInterface $singerService)
    {
        $this->singerService = $singerService;
    }

    public function index()
    {
        $singers = Singer::where('user_id', Auth::user()->id)->get();
        return view('singer.index', compact('singers'));
    }

    public function create()
    {
        return view('singer.create');
    }

    public function store(Request $request)
    {
        if (Singer::where('name', '=', $request->name)->exists()) {
            $request->session()->flash('error','Ca sĩ đã tồn tại!');
        } else {
            $this->singerService->create($request);
        }
         return redirect()->route('singer.index');
    }
}

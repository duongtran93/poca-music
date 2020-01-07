<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateSingerRequest;
use App\Http\Requests\SearchRequest;
use App\Service\SingerServiceInterface;
use App\Singer;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class SingerController extends Controller
{
    public $singerService;

    public function __construct(SingerServiceInterface $singerService)
    {
        $this->singerService = $singerService;
    }

    public function index()
    {
        $singers = Singer::where('user_id','=', Auth::user()->id)->get();
        return view('singer.index', compact('singers'));
    }

    public function create()
    {
        return view('singer.create');
    }

    public function store(CreateSingerRequest $request)
    {
        if (Singer::where('name', '=', $request->name)->exists()) {
            $request->session()->flash('error','Ca sĩ đã tồn tại!');
            return back();
        } else {
            $this->singerService->create($request);
            toastr()->success('Thêm mới ca sĩ thành công!');
            return redirect()->route('singer.index');
        }
    }
    public function singerGuest()
    {
        $singers = $this->singerService->getAll();
        return view('singer.guest', compact('singers'));
    }

    public function information($id)
    {
        $singer = $this->singerService->findById($id);
        return view('singer.information' , compact('singer'));
    }

    public function informationSingerGuest($id)
    {
        $singer = $this->singerService->findById($id);
        return view('singer.informationGuest', compact('singer'));
    }
}

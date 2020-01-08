<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateSingerRequest;
use App\Http\Requests\SearchRequest;
use App\Service\SingerServiceInterface;
use App\Singer;
use App\Song;
use Illuminate\Http\Request;
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
        $singers = Singer::where('user_id', Auth::user()->id)->get();
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
        $songs = $singer->songs()->get();
        return view('singer.information' , compact('singer', 'songs'));
    }

    public function listen($id) {
        $singer = $this->singerService->findById($id);
        $songs = $singer->songs()->get();
        $firstSong = $singer->songs()->get()->first();
        return view('singer.listen', compact('songs', 'firstSong','singer'));
    }

    public function informationSingerGuest($id)
    {
        $singer = $this->singerService->findById($id);
        $songs = $singer->songs()->get();
        return view('singer.informationGuest', compact('singer', 'songs'));
    }

    public function listenGuest($id) {
        $singer = $this->singerService->findById($id);
        $songs = $singer->songs()->get();
        $firstSong = $singer->songs()->get()->first();
        return view('singer.listenGuest', compact('songs', 'firstSong','singer'));
    }

    public function addSingers(Request $request, $songId) {
        $data = $request->input('tagSinger');
        $arrData = explode(',', $data);
        foreach ($arrData as $singer1) {
            if (Singer::where('name', '=', $singer1)->exists()) {
                $singerId = DB::table('singers')->select('id')->where('name', '=', $singer1)->get()->first()->id;
                $song = Song::findOrFail($songId);
                $song->singers()->attach($singerId);
            }
        }
        return back();
    }

    public function autocomplete(Request $request) {
        if ($request->get('query')) {
            $query = $request->get('query');
            $data = DB::table('singers')->where('name', 'LIKE', '%'.$query.'%')->get();
            $output = '<ul class="dropdown-menu" style="display: block; position: relative">';
            foreach ($data as $row) {
                $output .= '<li class="dropdown-item"><a href="#">'.$row->name.'</a></li>';
            }
            $output .= '</ul>';
            echo $output;
        }
    }
}

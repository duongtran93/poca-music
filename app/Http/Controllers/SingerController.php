<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Http\Requests\CreateSingerRequest;
use App\Http\Requests\SearchRequest;
use App\Reply_comment;
use App\Service\SingerServiceInterface;
use App\Singer;
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
        $comments = Comment::where('singer_id','=',$singer->id)->orderBy('created_at', 'desc')->get();
        return view('singer.information' , compact('singer','comments'));
    }

    public function informationSingerGuest($id)
    {
        $singer = $this->singerService->findById($id);
        $comments = Comment::where('singer_id','=',$singer->id)->orderBy('created_at', 'desc')->get();
        return view('singer.informationGuest', compact('singer','comments'));
    }

    public function comment(Request $request, $id) {
        $comment = new Comment();
        $comment->singer_id = $id;
        $comment->content = $request->comment;
        $comment->user_id = Auth::user()->id;
        $comment->save();
        return back();
    }

    public function replyComment(Request $request, $id) {
        $reply = new Reply_comment();
        $reply->comment_id = $id;
        $reply->content = $request->reply_comment;
        $reply->user_id = Auth::user()->id;
        $reply->save();
        return back();
    }
}

<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Http\Requests\CreateAndEditPlaylistRequest;
use App\Http\Requests\SearchRequest;
use App\Like;
use App\Playlist;
use App\Playlistlike;
use App\Reply_comment;
use App\Service\PlayListServiceInterface;
use App\Song;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PlayListController extends Controller
{
    public $playlistService;

    public function __construct(PlayListServiceInterface $playlistService)
    {
        $this->playlistService = $playlistService;
//        $this->middleware('auth');
    }

    public function index()
    {
        $playlists = Playlist::where('user_id', Auth::user()->id)->get();
        return view('playlist.index', compact('playlists'));
    }

    public function create()
    {
        return view('playlist.index');
    }

    public function store(CreateAndEditPlaylistRequest $request)
    {
        $this->playlistService->create($request);
        toastr()->success('Tạo mới thành công!');
        return back();
    }

    public function addSongToPlaylist($playlistId, $songId) {
        $playlist = Playlist::findOrFail($playlistId);
        $playlist->songs()->attach($songId);

    }

    public function deleteSongInPlaylist($playlistId, $songId) {
        $playlist = Playlist::findOrFail($playlistId);
        $playlist->songs()->detach($songId);
    }

    public function delete($id)
    {
        $this->playlistService->delete($id);
        toastr()->success('Xóa playlist thành công!');
        return redirect()->route('playlist.index');
    }

    public function edit($id)
    {
        $playlist = $this->playlistService->findById($id);
        return view('playlist.information', compact('playlist'));
    }

    public function update(CreateAndEditPlaylistRequest $request, $id)
    {
        $this->playlistService->edit($request , $id);
        toastr()->success('Cập nhật thành công!');
        return back();
    }
    public function information($id){
        $playlist = $this->playlistService->findById($id);
        $songs = $playlist->songs()->get();
        $comments = Comment::where('playlist_id','=',$playlist->id)->orderBy('created_at', 'desc')->get();
        return view('playlist.information',compact('playlist', 'songs','comments'));
    }

    public function listen($id) {
        Playlist::where('id', $id)->increment('listen_count');
        $playlist = $this->playlistService->findById($id);
        $songs = $playlist->songs()->get();
        $firstSong = $playlist->songs()->get()->first();
        return view('playlist.listen', compact('songs', 'firstSong','playlist'));
    }

    public function likePlaylist(Request $request)
    {
        $playlist_id = $request['playlistId'];
        $is_like = $request['isLike'] === 'true';
        $update = false;
        $playlist = Playlist::find($playlist_id);
        if (!$playlist) {
            return null;
        }
        $user = Auth::user();
        $like = $user->playlistlikes()->where('playlist_id', $playlist_id)->first();
        if ($like) {
            $already_like = $like->like;
            $update = true;
            if ($already_like == $is_like) {
                $like->delete();
                return null;
            }
        } else {
            $like = new Playlistlike();
        }
        $like->like = $is_like;
        $like->user_id = $user->id;
        $like->playlist_id = $playlist->id;
        if ($update) {
            $like->update();
        } else {
            $like->save();
        }
        return null;
    }

    public function informationOC($id){
        $playlist = $this->playlistService->findById($id);
        $songs = $playlist->songs()->get();
        $comments = Comment::where('playlist_id','=',$playlist->id)->orderBy('created_at', 'desc')->get();
        return view('playlist-customer.information',compact('playlist', 'songs','comments'));
    }

    public function listenGuest($id) {
        Playlist::where('id', $id)->increment('listen_count');
        $playlist = $this->playlistService->findById($id);
        $songs = $playlist->songs()->get();
        $firstSong = $playlist->songs()->get()->first();
        return view('playlist-customer.listenGuest', compact('songs', 'firstSong','playlist'));
    }

    public function replyComment(Request $request,$id) {
        $reply = new Reply_comment();
        $reply->comment_id = $id;
        $reply->content = $request->reply_comment;
        $reply->user_id = Auth::user()->id;
        $reply->save();
        return back();
    }

    public function comment(Request $request, $id) {
        $comment = new Comment();
        $comment->playlist_id = $id;
        $comment->content = $request->comment;
        $comment->user_id = Auth::user()->id;
        $comment->save();
        return back();
    }
}

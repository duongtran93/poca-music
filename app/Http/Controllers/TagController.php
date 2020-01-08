<?php

namespace App\Http\Controllers;

use App\Song;
use App\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class TagController extends Controller
{

    public function index($tagId) {
        $tag = Tag::findOrFail($tagId);
        $songs = $tag->songs()->get();
        return view('tags.index', compact('tag','songs'));
    }

    public function addTags(Request $request, $songId) {
            $data = $request->tagName;
            $arrData = explode(',', $data);
            foreach ($arrData as $tag1) {
                if (Tag::where('name', '=', $tag1)->exists()) {
                    $tagId = DB::table('tags')->select('id')->where('name', '=', $tag1)->get()->first()->id;
                    $song = Song::findOrFail($songId);
                    $song->tags()->attach($tagId);
                } else {
                    $tag = new Tag();
                    $tag->name = $tag1;
                    $tag->user_id = Auth::user()->id;
                    $tag->save();
                    $tag_id = $tag->id;
                    $song = Song::findOrFail($songId);
                    $song->tags()->attach($tag_id);
                }

            }
            return back();

    }

    public function autocomplete(Request $request) {
        if ($request->get('query')) {
            $query = $request->get('query');
            $data = DB::table('tags')->where('name', 'LIKE', '%'.$query.'%')->get();
            $output = '<ul class="dropdown-menu" style="display: block; position: relative">';
            foreach ($data as $row) {
                $output .= '<li class="dropdown-item"><a href="#">'.$row->name.'</a></li>';
            }
            $output .= '</ul>';
            echo $output;
        }
    }
}

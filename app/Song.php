<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Song extends Model
{
    protected $table = 'songs';

    public function user() {
        return $this->belongsTo('App\User');
    }

    public function playlists()
    {
        return $this->belongsToMany('App\Playlist');
    }

    public function category() {
        return $this->belongsTo('App\Category');
    }
}

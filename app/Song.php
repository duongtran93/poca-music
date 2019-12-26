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

    public function categories() {
        return $this->belongsToMany('App\Category');
    }

    public function likes() {
        return $this->belongsTo('App\Like');
    }

    public function comments()
    {
        return $this->hasMany('App\comment');
    }
}

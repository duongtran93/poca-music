<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Playlist extends Model
{
    protected $table = 'playlists';

    public function user() {
        return $this->belongsTo('App\User');
    }

    public function songs() {
        return $this->belongsToMany('App\Song');
    }
}

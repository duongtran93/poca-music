<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PlayList extends Model
{
    protected $table = 'playlists';
    public function user() {
        return $this->belongsTo('App\User');
    }
}

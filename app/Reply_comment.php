<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reply_comment extends Model
{
    protected $table = 'reply_comments';

    public function comment() {
        return $this->belongsTo('App\Comment');
    }

    public function user() {
        return $this->belongsTo('App\User');
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    protected $table = 'likes';

    public function song() {
        return $this->belongsTo('App\Song');
    }

    public function user() {
        return $this->belongsTo('App\User');
    }
}

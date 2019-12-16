<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Song extends Model
{
    protected $table = 'songs';
    public function user() {
        return $this->belongsTo('App\User');
    }
}

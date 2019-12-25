<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Singer extends Model
{
    protected $table = 'singers';

    public function user() {
        return $this->belongsTo('App\User');
    }

    public function comments()
    {
        return $this->hasMany('App\comment');
    }
}

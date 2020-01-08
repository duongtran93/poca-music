<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'provider'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function songs() {
        return $this->hasMany('App\Song');
    }

    public function playlists() {
        return $this->hasMany('App\Playlist');
    }

    public function singer()
    {
        return $this->hasMany('App\Singer');
    }

    public function likes() {
        return $this->hasMany('App\Like');
    }

    public function playlistlikes()
    {
        return $this->hasMany('App\Playlistlike');
    }

    public function comments()
    {
        return $this->hasMany('App\Comment');
    }

    public function tags()
    {
        return $this->hasMany('App\Tag');
    }
}

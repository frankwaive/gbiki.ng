<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'sex', 'about', 'avatar', 
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
    *Get the posts this user has made
    **/
    public function post(){
        return $this->hasMany('App\Post');
    }

    /**
    *Get the comments this user has made
    **/
    public function comment(){
        return $this->hasMany('App\Comment');
    }
}

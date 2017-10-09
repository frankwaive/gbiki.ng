<?php

namespace App;


use Illuminate\Foundation\Auth\User as Authenticatable;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Notifications\Notifiable;



class User extends Authenticatable
{
    

    use Sluggable, Notifiable;

    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }

    public function follows() {
        return $this->hasMany(Follow::class);
    }

    public function isFollowing($target_id)
    {
        return (bool)$this->follows()->where('target_id', $target_id)->first(['id']);
    }


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'sex', 'about', 'avatar', 'slug',
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

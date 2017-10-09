<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Cviebrock\EloquentSluggable\Sluggable;



class Post extends Model
{   


 use Sluggable, Notifiable, CommentableTrait;

    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'post_title'
            ]
        ];
    }


	protected $fillable = [
    'post_title', 'slug', 'post_content', 'featured_img', 'user_id', 'category_id',
    ];
	/**
    *Get the user who made this post
    **/

    public function user()
    {
        return $this->belongsTo(User::class);
    }

	/**
    *Get the category of this post
    **/
    	public function category()
    {
    	return $this->belongsTo('App\Category');
    }


    /**
    *Get the cooments affiliated with this post
    **/
    	public function comment()
    {
    	return $this->hasMany ('App\Comment');
    }
}

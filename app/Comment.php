<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
	    protected $fillable = [
        'comment', 'post_id', 'user_id',
    ];

	/**
   Get the user who made this comment 
   **/
   public function user(){

   	return $this->belongsTo('App\User');
   }

   /**
   Get the post the comment is attached to
   **/
   public function post(){

   	return $this->belongsTo('App\Post');
   }


}

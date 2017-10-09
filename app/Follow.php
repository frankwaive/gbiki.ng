<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;


class Follow extends Model
{
	use Notifiable;
    protected $fillable = ['target_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

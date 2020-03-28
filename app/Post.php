<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable =
    ['title', 'content', 'user_id'];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function image()
    {
        return $this->hasOne('App\Image');
    }

    public function tags()
    {
        return $this->belongsToMany('App\Tag');
    }
}

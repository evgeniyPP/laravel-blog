<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $fillable = ['filename', 'mime', 'original_filename', 'post_id'];
    public $timestamps = false;

    public function post()
    {
        return $this->belongsTo('App\Post');
    }
}

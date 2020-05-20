<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    public function genres(){
        return $this->belongsToMany('App\Genre','content_genres');
    }

    public function movieCaptions(){
        return $this->hasMany('App\MovieCaption');
    }

    public function comments(){
        return $this->hasMany('App\Comment');
    }
}

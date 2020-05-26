<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Serie extends Model
{
    public function genres(){
        return $this->belongsToMany('App\Genre','series_genres');
    }

    public function comments(){
        return $this->hasMany('App\Subcomment');
    }

    public function reviews(){
        return $this->hasMany('App\SerieReview');
    }

    public function seasons(){
        return $this->hasMany('App\Season');
    }
}

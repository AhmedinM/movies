<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
    public function movies(){
        return $this->belongsToMany('App\Movie','content_genres');
    }

    public function series(){
        return $this->belongsToMany('App\Serie','series_genres');
    }
}

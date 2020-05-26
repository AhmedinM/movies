<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Episode extends Model
{
    public function season(){
        return $this->belongsTo('App\Season');
    }

    public function serie(){
        return $this->belongsTo('App\Serie','seasons');
    }

    public function episodeCaptions(){
        return $this->hasMany('App\EpisodeCaptions');
    }
}

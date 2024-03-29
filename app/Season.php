<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Season extends Model
{
    public function serie(){
        return $this->belongsTo('App\Serie');
    }

    public function episodes(){
        return $this->hasMany('App\Episode');
    }
}

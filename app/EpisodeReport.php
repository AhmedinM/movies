<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EpisodeReport extends Model
{
    public function user(){
        return $this->belongsTo('App\User');
    }

    public function episode(){
        return $this->belongsTo('App\Episode');
    }
}

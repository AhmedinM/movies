<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PlaylistSerie extends Model
{
    public function episode(){
        return $this->belongsTo('App\Episode');
    }
}

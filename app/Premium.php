<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Premium extends Model
{
    public function user(){
        return $this->belongsTo('App\User');
    }
}

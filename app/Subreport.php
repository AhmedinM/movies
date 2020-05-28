<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subreport extends Model
{
    public function user(){
        return $this->belongsTo('App\User');
    }

    public function subcomment(){
        return $this->belongsTo('App\Subcomment');
    }
}

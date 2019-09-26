<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Invite extends Model
{

    public function students(){
        return $this->hasOne('App\Student');
    }
    public function projects(){
        return $this->belongsTo('App\Project');
    }
    //
}

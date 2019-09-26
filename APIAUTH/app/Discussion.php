<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Discussion extends Model
{
    protected $dates = ['date'];
    public function project(){
        return $this->hasOne('App\Project');
    }
    //
}

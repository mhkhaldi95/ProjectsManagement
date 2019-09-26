<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    public function username(){
        return $this->hasOne('App\User');
    }
    //
}

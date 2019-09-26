<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    public function students(){
        return $this->hasMany('App\Student');
    }
    public function teachers(){
        return $this->belongsToMany('App\Teacher','teacher_project');
    }
    public function discussion(){
        return $this->hasOne('App\Discussion');
    }








    public function invites(){
        return $this->hasMany('App\Invite','project_id','id');
    }

    //
}

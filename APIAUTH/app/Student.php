<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable = [
        'name', 'password','IDD','phone','specialization','level','user_id'
    ];
    public function project(){
      return $this->hasOne('App\Project','id','project_id');
    }

    //
}

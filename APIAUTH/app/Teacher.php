<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    protected $fillable = [
        'name','IDD','phone','specialization','user_id'
    ];

    public function projects(){
        return $this->belongsToMany('App\Project','teacher_project');
    }
    //
}

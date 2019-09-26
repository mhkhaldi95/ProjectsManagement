<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class guest extends Controller
{

    public function login ()
    {

        return view('auth.logintest');
    }
    //
}

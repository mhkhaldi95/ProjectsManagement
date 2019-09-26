<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;


class languagecont extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function change($lang){

       Session::put('lang',$lang);

        return redirect()->back();
    }
    //
}

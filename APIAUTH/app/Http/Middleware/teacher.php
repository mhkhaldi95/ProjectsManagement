<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class teacher
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(Auth::check()){
            if(Auth::user()->role==2)
                return $next($request);
            else
                return Redirect::back()->withErrors(['أنت لست معلم حتى تدخل هذه الصفحة']);
        }else {
            return "sad";
        }



    }
}

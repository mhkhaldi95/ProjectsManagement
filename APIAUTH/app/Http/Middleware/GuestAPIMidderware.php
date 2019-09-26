<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class GuestAPIMidderware
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
        {
            if(count($request->user())==0)
                return response()->json(['error'=>'انت مسجل دخول بالموقع'],'403');
            else return $next($request);
        }
    }
}

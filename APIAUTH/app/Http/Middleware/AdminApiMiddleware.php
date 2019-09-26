<?php

namespace App\Http\Middleware;

use Closure;

class AdminApiMiddleware
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
        if($request->user()->role==3)
            return $next($request);
        else
            return response()->json(['error'=>'غير مسموح'],401);
    }
}

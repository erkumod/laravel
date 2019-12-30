<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class SiteAdmin
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
     if (Auth::user() &&  Auth::user()->user_type == 'admin') {
            return $next($request);
     }
    if(!session()->has('url.intended'))
        {
            session(['url.intended' => url()->previous()]);
        }

    return redirect('/home');
}
}

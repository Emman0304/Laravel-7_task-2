<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class StudentMiddleware
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
        //admin role = 0;
        //student role = 1;

        if (Auth::check()) {
            if (Auth::user()->role=='1') {
                return $next($request);
            }else {
                return redirect('/admin/dashboard')->with('message','Access denied as youa re not a student!');
            }
        }else {
            return redirect('/login')->with('message','Login to access the website info!');
        }

        return $next($request);
    }
}

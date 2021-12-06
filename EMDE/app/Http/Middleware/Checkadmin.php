<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Checkadmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        //login of middleware
        Auth::user() -> email;
        if (  $request -> email != 'rachidmohamed@gmail.com'){
            return redirect() -> route('noadmin');
        }


        return $next($request);
    }
}

<?php

namespace App\Http\Middleware;

use Closure;

class AuthAdminRedirect
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
        return "radi";
        if(auth()->guard('admin')) {
            //return redirect()->route('admin');
        }else{
            return redirect()->route('admin');
        }

        //return $next($request);
    }
}

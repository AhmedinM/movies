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
    public function handle($request, Closure $next, $guard = null)
    {
        //dd(auth()->guard('admin')->check());
        if (!auth()->guard('admin')->check()) {
            return redirect()->route('admin.login');
        }

        return $next($request);
    }
}

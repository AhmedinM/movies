<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Auth;

use Closure;

class CheckVerification
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
        $user = auth()->user();

        if($user!==null){

        if($user['email_verified_at']==NULL){
            //return redirect('home');
            echo "<a href=\"email/verify\"</a>";
            abort(403, 'Nijeste verifikovali email adresu.');
        }}

        return $next($request);
    }
}

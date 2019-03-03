<?php

namespace App\Http\Middleware;

use Closure, Session;

class RedirectIfUserRegOff
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
        $isRegOn = (bool)env('USER_REGISTRATION');
        if($isRegOn){
            return $next($request);
        }
        else{
            $error =  'User registration is not available at this point of time.';
            return redirect()->route('login')->withError($error);
        }
    }
}

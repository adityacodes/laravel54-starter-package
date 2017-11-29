<?php

namespace App\Http\Middleware;

use Closure, Session;

class RedirectIfRegOff
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
        $isRegOn = env('ADMIN_REGISTRATION');
        if($isRegOn){
            return $next($request);
        }
        else{
            Session::flash('warning', 'Admin registration is not available at this point of time.');
            return redirect('/admin/login');
        }
    }
}

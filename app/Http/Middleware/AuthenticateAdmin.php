<?php

namespace App\Http\Middleware;

use Closure;
use Auth, Session;

class AuthenticateAdmin
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
        if (! Auth::guard('admin')->check()) {
          Session::flash('warning', 'You must login first in order to continue.');
           return redirect('/admin/login');
       }

       return $next($request);
    }
}

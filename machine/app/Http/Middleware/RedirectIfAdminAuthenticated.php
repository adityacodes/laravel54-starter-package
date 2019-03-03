<?php

namespace App\Http\Middleware;

use Closure, Auth;

class RedirectIfAdminAuthenticated
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
        //If request comes from logged in user, he will
      //be redirect to home page.
      if (Auth::guard()->check()) {
          return redirect('/user/dashboard');
      }

      //If request comes from logged in admin, he will
      //be redirected to admin's home page.
      if (Auth::guard('admin')->check()) {
          return redirect('/admin/dashboard');
      }
      return $next($request);
    }
}

<?php

namespace App\Http\Middleware;

use Closure;

class SetupInstaller
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
        $isOn = (bool)env('SETUP_ACCESS');
        if (!$isOn) {
            return redirect('/');
        }
        return $next($request);
    }
}

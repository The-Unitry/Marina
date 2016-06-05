<?php

namespace Navicula\Http\Middleware;

use Closure;
use Auth;

class AdminAuthenticate
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if (!Auth::check() || !Auth::user()->is('admin')) {
            return redirect('/login');
        }

        return $next($request);
    }
}
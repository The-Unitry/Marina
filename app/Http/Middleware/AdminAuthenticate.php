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
        if (!Auth::check() || !Auth::user()->isAdmin()) {
            return redirect('/login')->with(
                'unauthorized', 'U heeft geen toegang tot deze pagina.'
            );
        }

        return $next($request);
    }
}
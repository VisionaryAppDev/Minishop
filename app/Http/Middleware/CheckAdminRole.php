<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class CheckAdminRole
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
        if (Auth::check() && Auth::user()->role == 'admin') {
            return $next($request);
        }
        elseif (Auth::check() && Auth::user()->role == 'user') {
            abort(403, 'Unauthorized action.');
        }
        else if(Auth::check()){
            abort(403, 'Unauthorized action.');
        }
        else {
            return redirect('/login');
        }
    }
}

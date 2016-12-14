<?php

namespace App\Http\Middleware;

use Closure;  
use Illuminate\Support\Facades\Auth;

class User  
{
  public function handle($request, Closure $next, $guard = null)
  {
    if (Auth::guard($guard)->guest()) {
        if ($request->ajax()) {
        return response('Unauthorized.', 401);
        } else {
            return redirect()->guest('login');
        }
    } else if (!(Auth::guard($guard)->user()->active == 2) && !(Auth::guard($guard)->user()->active == 1)) {
        return redirect()->route('login');
    }
    return $next($request);
  }
}
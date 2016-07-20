<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class Authenticate
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
        if (Auth::guard($guard)->guest()) {
            if ($request->ajax() || $request->wantsJson()) {
                return response('Unauthorized.', 401);
<<<<<<< HEAD
            }

            return redirect()->guest('login');
=======
            } else {
                return redirect()->guest('login');
            }
>>>>>>> 1c7c8fb3f1680cb7f0e94d5085418444e759bf65
        }

        return $next($request);
    }
}

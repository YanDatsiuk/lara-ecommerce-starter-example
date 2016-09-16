<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class AdministratorMiddleware
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

        $user = Auth::user();

        //Перевірки чи користувач є модератором
        if ($user->role != 'admin') {
            if ($request->ajax()) {
                return response('Unauthorized.', 401);
            } else {
                //todo Change redirect url.
                return redirect()->guest('login');
            }
        }


        return $next($request);
    }
}

<?php

namespace TeamQilin\Http\Middleware;

use Closure;

class AdminMiddleware
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
        if (session()->get('is_admin')=='A') {

            return Redirect::intended();

        }else{
            return redirect()->guest('auth/login');

        }

        return $next($request);


    }
}

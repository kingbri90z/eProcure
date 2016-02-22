<?php

namespace TeamQilin\Http\Middleware;

use Closure;
use Redirect;
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
        //dd(session()->get('is_admin'));
        if (session()->get('is_admin')==false) {

            return redirect('blocks');
            
        }

        return $next($request);


    }
}

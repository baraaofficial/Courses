<?php

namespace App\Http\Middleware;

use Closure;

class Admin
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
        if (auth()->guest()){
            return redirect('/register');
        }

        if (auth()->user()->is_admin != 'admin'){
            return redirect('/');
        }
        return $next($request);
    }
}

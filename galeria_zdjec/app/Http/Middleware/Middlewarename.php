<?php

namespace App\Http\Middleware;

use App\Gallery;
use Closure;
use Illuminate\Contracts\Auth\Guard;

class Middlewarename
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $token)
    {
        if ( $token == url()->current() ) {
            return $next($request);
        }
    }
}

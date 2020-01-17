<?php

namespace App\Http\Middleware;

use Closure;

class Middlewarename
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
      //  if ($request->token == url()->current()) {
            return $next($request);
       // }
    }
}

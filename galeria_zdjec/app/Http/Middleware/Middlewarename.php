<?php

namespace App\Http\Middleware;

use App\Gallery;
use App\User;
use Closure;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider;
use Illuminate\View\View;

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
        $currentPath = $request->segment(count(request()->segments()));
        $token = $request->route('token');

        echo $token;
        if ( ! $currentPath  == $token ) {
            return redirect('login');
         }

        return $next($request);
    }
}


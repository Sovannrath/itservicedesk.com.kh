<?php

namespace App\Http\Middleware;

use Closure;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;

class checkRoles
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
        
        if (Auth::check())
        {
            if(Auth::user()->isManager())
            {
                return $next($request);
            }
        }

    return redirect('login');
        //return $next($request);
    }
}

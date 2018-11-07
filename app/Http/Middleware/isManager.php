<?php

namespace App\Http\Middleware;

use Closure;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;
use App\Http\Controllers\Session;

class isManager
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
        if(Session()->get('user.0.BusinessRoleID') == 2){
                return $next($request);
            }
            return back();
        }
}
